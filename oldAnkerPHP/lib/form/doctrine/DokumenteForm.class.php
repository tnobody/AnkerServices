<?php

/**
 * Dokumente form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DokumenteForm extends BaseDokumenteForm {

    public function configure() {
        unset(
                $this['angelegt'], $this['letzte_aenderung'], $this['profil_id']
        );

        $this->disableLocalCSRFProtection();

        $this->widgetSchema['pfad'] = new sfWidgetFormInputFile(array(
                    'label' => 'Dokument hochladen'
                ));

        $this->widgetSchema->setHelp('pfad', 'Erlaubte Dateitypen: PDF, JPG, PNG. Maximale Dateigröße: 5MB');


        /* new sfWidgetFormInputSWFUpload(array(
          'label' => 'Dokument hochladen',
          'swfupload_button_image_url' => public_path('/images/add.png'),
          'swfupload_upload_url' => url_for('filehandler/upload') . '?action=upload&' . ini_get('session.name') . '=' . session_id()
          )); */

        $this->validatorSchema['pfad'] = new sfValidatorFile(array(
                    'required' => true,
                    'path' => sfConfig::get('dokumente_upload_dir'),
                    'mime_types' => array('application/pdf', 'image/jpg', 'image/jpeg', 'image/png'),
                    'max_size' => 5242880
                ));

        $this->validatorSchema['pfad']->setMessage(
                'required', 'Es wurde keine Datei angegeben'
        );
        $this->validatorSchema['pfad']->setMessage(
                'max_size', 'Datei ist zu groß (Maximum: %max_size% Byte)'
        );
        $this->validatorSchema['pfad']->setMessage(
                'mime_types', 'Ungültiger Dateityp'
        );
        $this->validatorSchema['pfad']->setMessage(
                'partial', 'Die Datei konnte nicht vollständig übertragen werden'
        );
        $this->validatorSchema['pfad']->setMessage(
                'no_tmp_dir', 'Das temporäre Verzeichnis konnte nicht gefunden werden'
        );
        $this->validatorSchema['pfad']->setMessage(
                'cant_write', 'Keine Schreibberechtigung'
        );
        $this->validatorSchema['pfad']->setMessage(
                'extension', 'Ungültige Dateiendung'
        );
    }

}
