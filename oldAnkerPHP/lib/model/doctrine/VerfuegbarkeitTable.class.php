<?php


class VerfuegbarkeitTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Verfuegbarkeit');
    }
    
    /**
     * Hohlt verfügbarkeiten zu einer profil_id aus der Datenbank
     * @param int $profil_id Profil Id
     * @return array Array aus Verfügbarkeiten
     */
    public function getVerfuegbarkeitenByProfilId($profil_id) {
        
        // Zugehörige Verfügbarkeiten
        //SELECT SUM(stundenzahl), profil_id, DAYOFWEEK(datum) AS wochentag FROM `verfuegbarkeit` WHERE profil_id = 38 GROUP BY(wochentag)
        // DAYOFWEEK: 1 = Sonntag ... 7 = Samstag
        // Hohlt alle Tage aus den Verfügbarkeiten eines Profils,
        // die nach dem heutigen Tag liegen und zählt die jeweilige
        // Anzahl pro Wochentag
        $q = Doctrine_Query::create()
                ->select('DAYOFWEEK(v.datum) AS wochentag')
                ->addSelect('COUNT(v.datum) AS anzahl')
                ->from('verfuegbarkeit v')
                ->Where('v.profil_id = ?', $profil_id)
                ->AndWhere('v.datum > NOW()')
                ->GroupBy('wochentag');

        return $q->fetchArray();
    }
    
    
    
}