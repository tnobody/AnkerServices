<?php


class ProfileTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Profile');
    }
    
    /**
     * Hohlt profil_ids aus der Datenbank, die Kompetenzen aus 
     * $kompetenzen besitzen
     * @param array $kompetenzen Array mit Ids von Kompetenzen
     * @return array Array aus profil_ids
     */
    public function getProfilesHavingKompetenzen($kompetenzen) {
        
        // Profile erfassen
        // Profile werden nach der Anzahl der gefundenen Niveaus absteigend
        // geordnet
        $q = Doctrine_Query::create()
                ->select('DISTINCT(p.profil_id) AS profil_id')
                ->from('Niveaus n')
                ->leftJoin('n.Profile p')
                ->leftJoin('n.Kompetenzen k')
                ->whereIn('k.kompetenz_id', $kompetenzen)
                ->groupBy('n.profil_id')
                ->orderBy('COUNT(n.niveau_id) DESC');

        //sfFirePHP::getInstance(true)->fb($q->getSqlQuery());
        //$profile = $q->fetchArray(array());
        $profile = $q->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        
        // workaround: single object isn't mapped to an array
        if (count($profile) == 1) {
            $profile = array(0 => $profile);
        }
        
        return $profile;
    }
    
}