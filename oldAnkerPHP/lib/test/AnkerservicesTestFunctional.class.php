<?php

class AnkerservicesTestFunctional extends sfTestFunctional {

    public function loadData() {
        // Inhalt aller Tabellen leeren
        $query = "SELECT Concat('TRUNCATE TABLE ', table_name) FROM INFORMATION_SCHEMA.tables WHERE table_schema = 'an00027_test'";
        $doctrine = Doctrine_Manager::getInstance()->getCurrentConnection();

        $res = $doctrine->execute($query)->fetchAll();
        echo "Truncating tables...\n";
        foreach($res as $r) {
            $doctrine->execute($r[0]);
        }
        Doctrine_Core::loadData(sfConfig::get('sf_test_dir') . '/fixtures');

        return $this;
    }

    public function getRememberKey() {
        return sfConfig::get('app_sf_guard_plugin_remember_cookie_name', 'sfRemember');
    }

}

?>
