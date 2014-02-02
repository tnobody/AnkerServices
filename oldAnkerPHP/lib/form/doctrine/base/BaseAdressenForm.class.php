<?php

/**
 * Adressen form base class.
 *
 * @method Adressen getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdressenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'alias'              => new sfWidgetFormInputText(),
      'strasse_und_hausnr' => new sfWidgetFormInputText(),
      'plz'                => new sfWidgetFormInputText(),
      'ort'                => new sfWidgetFormInputText(),
      'land'               => new sfWidgetFormInputText(),
      'profil_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'letzte_aenderung'   => new sfWidgetFormDateTime(),
      'angelegt'           => new sfWidgetFormDateTime(),
      'latitude'           => new sfWidgetFormInputText(),
      'longitude'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'alias'              => new sfValidatorString(array('max_length' => 50)),
      'strasse_und_hausnr' => new sfValidatorString(array('max_length' => 100)),
      'plz'                => new sfValidatorInteger(),
      'ort'                => new sfValidatorString(array('max_length' => 50)),
      'land'               => new sfValidatorString(array('max_length' => 100)),
      'profil_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'letzte_aenderung'   => new sfValidatorDateTime(),
      'angelegt'           => new sfValidatorDateTime(),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adressen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adressen';
  }

}
