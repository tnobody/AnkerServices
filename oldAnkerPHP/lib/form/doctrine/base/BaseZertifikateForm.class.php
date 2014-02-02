<?php

/**
 * Zertifikate form base class.
 *
 * @method Zertifikate getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZertifikateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'zertifikat_id' => new sfWidgetFormInputHidden(),
      'bezeichnung'   => new sfWidgetFormInputText(),
      'profil_id'     => new sfWidgetFormInputHidden(),
      'beschreibung'  => new sfWidgetFormTextarea(),
      'link'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'zertifikat_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('zertifikat_id')), 'empty_value' => $this->getObject()->get('zertifikat_id'), 'required' => false)),
      'bezeichnung'   => new sfValidatorString(array('max_length' => 75)),
      'profil_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('profil_id')), 'empty_value' => $this->getObject()->get('profil_id'), 'required' => false)),
      'beschreibung'  => new sfValidatorString(array('required' => false)),
      'link'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zertifikate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zertifikate';
  }

}
