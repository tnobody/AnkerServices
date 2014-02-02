<?php


class KompetenzenTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Kompetenzen');
    }
    
    /**
     * Holt:
     * - alle Kompetenzen, die Kinder der Kategorien in $kk_ids sind
     * - alle Kompetenzkategorien und deren Kompetenzen, deren Eltern sich in 
     *      $kk_ids befinden
     * -alle Kompetenzen die die gleiche Bezeichnung, wie die Kompetenzen in
     *      $k_ids haben 
     * aus der Datenbank.
     * @param array $kk_ids Array von Ids von Kompetenzkategorien
     * @param array $k_ids Array von Ids von Kompetenzen
     * @return array Array mit allen Kompetenzen nach obigem Muster
     * @return false Wenn die Parameter leer waren 
     */
    public function getAllFromDatabaseDependingOn($kk_ids, $k_ids) {
        // Alle Kompetenzen aus Kompetenzkategorien
        if (count($kk_ids) > 0) {

            // Kompetenzen aus den angegebenen Kategorien
            $sql = 'SELECT k.kompetenz_id FROM kompetenzen k WHERE k.kompetenz_kategorie_id IN (';

            // Alle Einzelkategorien
            foreach ($kk_ids as $value) {
                $sql .= $value . ',';
            }

            // Letztes Komma entfernen
            $sql = substr($sql, 0, -1);

            $sql .= ')';

            // und alle KOmeptenzen aus deren Unterkategorien
            foreach ($kk_ids as $value) {
                $sql .= " OR k.kompetenz_kategorie_id IN
                    (SELECT 
                        kompetenz_kategorie_id 
                    FROM kompetenz_kategorien 
                    WHERE   lft > (SELECT lft FROM kompetenz_kategorien WHERE kompetenz_kategorie_id = $value) 
                        AND rgt < (SELECT rgt FROM kompetenz_kategorien WHERE kompetenz_kategorie_id = $value)
                        AND root_id = (SELECT root_id FROM kompetenz_kategorien WHERE kompetenz_kategorie_id = $value)
                    )";
            }

            // nur aktive Kompetenzen anzeigen
            $sql .= ' AND k.aktiv = 1';
        }

        // Alle Kompetenzen und die, die die (3 mal ;)) gleiche Bezeichnung haben
        if (count($k_ids) > 0) {

            if (count($kk_ids) > 0) {
                $sql .= ' UNION ';
            } else {
                $sql = '';
            }

            // plain SQL wegen Komplexität
            $sql .= '(SELECT k.kompetenz_id FROM kompetenzen k WHERE k.kompetenz_id IN (';

            foreach ($k_ids as $value) {
                $sql .= $value . ',';
            }

            // Letztes Komma entfernen
            $sql = substr($sql, 0, -1);

            $sql .= '       
                    )
                    AND k.aktiv = 1 )';
        }
        //sfFirePHP::getInstance(true)->fb($sql);
        if (isset($sql)) {
            // TODO use this oder ähnliches
            $doctrine = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
            $q = $doctrine->query($sql);

            // Alle gefundenen Kompetenzen
            return $q->fetchAll(PDO::FETCH_COLUMN);
        } else {
            return false;
        }
        
    }
    
    /**
     * Hohlt Kompetenzen zu einer profil_id aus der Datenbank
     * @param int $profil_id Profil Id
     * @param boolean $group_by_niveau Soll das Ergebnis nach Niveaus gruppiert werden
     * @return array Array aus Kompetenzen
     */
    public function getKompetenzenByProfilId($profil_id, $group_by_niveau = false) {
        
        // Zugehörige Kompetenzen
        $q = Doctrine_Query::create()
                ->select('k.bezeichnung')
                ->addSelect('k.kompetenz_id')
                // @todo remove this
                // this is just a dummy select because doctrine would complain 
                // about a missing select of a field from the alias n (root class)
                ->addSelect('n.niveau')
                ->from('Niveaus n')
                ->leftJoin('n.Kompetenzen k')
                ->Where('n.profil_id = ?', $profil_id)
                ->andWhere('k.aktiv = ?', 1)
                ->orderBy('n.niveau ASC');

        $result = $q->fetchArray();

        $list = array();
        
        foreach($result as $r) {
            // Liste gruppiert nach Niveau ausgeben
            if ($group_by_niveau) {
                // Neue Gruppe anlegen, falls noch nicht vorhanden
                if (!array_key_exists($r['niveau'], $list)) {
                    $list[$r['niveau']] = array();
                } 
                // Kompetenz hinzufügen
                $list[$r['niveau']][] = $r['Kompetenzen'];
            } else {
                // ansonsten nur Kompetenzen auflisten
                $list[] = $r['Kompetenzen'];    
            }            
        }

        unset($result, $q);
        
        return $list;
    }
    
}