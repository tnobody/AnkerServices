<?php

/**
 * kompetenzen actions.
 *
 * @package    ankerservices
 * @subpackage kompetenzen
 * @author     Andreas Hanauska
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kompetenzenActions extends sfActions {

    // Holt alle Profile aus der DB, die modestens eine der gesuchten
    // Kompetenz(kategori)en innehaben
    public function executeSearch(sfWebRequest $request) {
        $query = $request->getParameter('query');

        if (empty($query)) {
            if ($request->isXmlHttpRequest()) {
                return $this->renderText('Geben Sie einen oder mehrere Suchbegriffe ein');
            }
        }
        
        // Extrahiere Kompetenz(kategorie)IDs aus dem query Parameter
        list($kk_ids, $k_ids) = AsLib::createKompetenzIdsFromQueryParam($query);

        // Hole alle Kompetenz(kategorien) aus der DB, die aus dem Request 
        // extrahiert werden konnten
        $result = Doctrine_Core::getTable('Kompetenzen')
                ->getAllFromDatabaseDependingOn($kk_ids, $k_ids);

        //sfFirePHP::getInstance(true)->fb($result);
    
        // Wenn Kompetenzen vorhanden
        if (count($result) > 0) {

            // Liste aus Profilen erstellen, die diese Kompetenzen besitzen
            $list = array();
            $i = 0;

            $profil_ids = Doctrine_Core::getTable('Profile')
                    ->getProfilesHavingKompetenzen($result);

            //sfFirePHP::getInstance(true)->fb($profil_ids);
            foreach ($profil_ids as $profil_id) {

                $profil = array();
                // Hole alle Kompetenzen zu diesem Profil
                $kompetenzen = Doctrine_Core::getTable('Kompetenzen')
                        ->getKompetenzenByProfilId($profil_id, true);
                
                $profil['kompetenzen'] = $kompetenzen;
                // Füge die zeitliche Verfügbarkeit hinzu
                $verfuegbarkeiten = Doctrine_Core::getTable('Verfuegbarkeit')
                        ->getVerfuegbarkeitenByProfilId($profil_id);

                // Acht Einträge wegen 7 = Samstag
                $verfuegbarkeiten_arr = array(0, 0, 0, 0, 0, 0, 0, 0);
                // Maxmiale Verfügbarkeit in Tagen
                $maximum = 0;

                foreach ($verfuegbarkeiten as $value) {
                    $verfuegbarkeiten_arr[$value['wochentag']] = $value['anzahl'];
                    if ($value['anzahl'] > $maximum) {
                        $maximum = $value['anzahl'];
                    }
                }

                $verfuegbarkeiten_arr['maximum'] = $maximum;

                $profil['verfuegbarkeiten'] = $verfuegbarkeiten_arr;
                $profil['profil_id'] = $profil_id;

                $list[$i++] = $profil;
            }

            $this->list = $list;

            $wochentage = array('Mo' => 2, 'Di' => 3, 'Mi' => 4, 'Do' => 5, 'Fr' => 6, 'Sa' => 7, 'So' => 1);
        }

        $this->niveaustufen = sfYaml::load(sfConfig::get('sf_config_dir') . '/app_data.yml');
        $this->niveaustufen = $this->niveaustufen['Niveaustufen'];

        // Wenn ein AJAX-Request der Ursprung ist
        if ($request->isXmlHttpRequest()) {
            if (!$this->list) {
                return $this->renderPartial('kompetenzen/noresults');
            } else {
                return $this->renderPartial('kompetenzen/profilelist', 
                    array (
                        'kompetenzen_searched' => array_merge($k_ids, $kk_ids),
                        'entries' => $this->list,
                        'kompetenz_ids' => $result,
                        'wochentage' => $wochentage,
                        'niveaustufen' => $this->niveaustufen
                    )
                );
            }
        // Wenn normaler Request
        } else {
            if (!$this->list) {
                $this->setVar('no_entries', true);
            } else {
                $this->setVar('no_entries', false);
                $this->setVar('kompetenzen_searched', array_merge($k_ids, $kk_ids));
                $this->setVar('entries', $this->list);
                $this->setVar('kompetenz_ids', $result);
                $this->setVar('wochentage', $wochentage);
                $this->setVar('niveaustufen', $this->niveaustufen);
            }
        }
    }

    // Liefert eine Liste aller Kompetenz(kategorien) im 
    // json-Format zurück, nach denen gesucht werden kann
    public function executeSuggest(sfWebRequest $request) {

        //$input = $request->getParameter('q');
        // Liste
        $data = array();

        // Datenbankverbindung für plain SQL holen
        $doctrine = Doctrine_Manager::getInstance()
            ->getCurrentConnection()
            ->getDbh();

        // plain SQL wegen fehlendem UNION
        $sql = "(SELECT 
                    DISTINCT(k.bezeichnung) AS bezeichnung, 
                    CONCAT('k_', k.kompetenz_id) AS id 
                    FROM kompetenzen k 
                    WHERE k.aktiv = 1 
                    GROUP BY k.bezeichnung
                )
                UNION
                (SELECT 
                    kk.bezeichnung AS bezeichnung, 
                    CONCAT('kk_', kk.kompetenz_kategorie_id) AS id 
                    FROM kompetenz_kategorien kk 
                    WHERE kk.aktiv = 1
                )";

        $q = $doctrine->query($sql);

        $kompetenzen = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($kompetenzen as $kompetenz) {
            $json = array();
            $json['id'] = $kompetenz['id'];
            $json['name'] = $kompetenz['bezeichnung'];
            $data[] = $json;
        }
        
        if ($request->isXmlHttpRequest()) {
            return $this->renderText(json_encode($data));
        }
    }

}
