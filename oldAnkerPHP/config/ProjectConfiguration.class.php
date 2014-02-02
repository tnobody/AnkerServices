<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfWidgetFormInputSWFUploadPlugin');
        $this->enablePlugins('sfDoctrineNestedSetPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('ankerservicesPlugin');
        $this->enablePlugins('sfJqueryTreeDoctrineManagerPlugin');
        $this->enablePlugins('sfFirePHPPlugin');

        sfConfig::add(array(
            'dokumente_upload_dir' => sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'dokumente' . DIRECTORY_SEPARATOR,
            'dokumente_upload_url' => '/uploads/dokumente/',
        ));
    }

    // configure doctrine engine
    public function configureDoctrine(Doctrine_Manager $manager) {
        // enable validation for doctrine records
        $manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL);
    }

}
