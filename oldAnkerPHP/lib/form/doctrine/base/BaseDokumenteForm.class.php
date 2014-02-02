<?php

/**
 * Dokumente form base class.
 *
 * @method Dokumente getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDokumenteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'titel'            => new sfWidgetFormInputText(),
      'angelegt'         => new sfWidgetFormDateTime(),
      'letzte_aenderung' => new sfWidgetFormDateTime(),
      'pfad'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'profil_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'titel'            => new sfValidatorString(array('max_length' => 75)),
      'angelegt'         => new sfValidatorDateTime(),
      'letzte_aenderung' => new sfValidatorDateTime(),
      'pfad'             => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('dokumente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dokumente';
  }

}
