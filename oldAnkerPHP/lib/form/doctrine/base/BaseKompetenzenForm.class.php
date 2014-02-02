<?php

/**
 * Kompetenzen form base class.
 *
 * @method Kompetenzen getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKompetenzenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kompetenz_id'           => new sfWidgetFormInputHidden(),
      'bezeichnung'            => new sfWidgetFormInputText(),
      'beschreibung'           => new sfWidgetFormInputText(),
      'kompetenz_kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('KompetenzKategorien'), 'add_empty' => true)),
      'aktiv'                  => new sfWidgetFormInputText(),
      'letzte_aenderung'       => new sfWidgetFormDateTime(),
      'angelegt'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'kompetenz_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('kompetenz_id')), 'empty_value' => $this->getObject()->get('kompetenz_id'), 'required' => false)),
      'bezeichnung'            => new sfValidatorString(array('max_length' => 50)),
      'beschreibung'           => new sfValidatorString(array('max_length' => 255)),
      'kompetenz_kategorie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('KompetenzKategorien'), 'required' => false)),
      'aktiv'                  => new sfValidatorInteger(array('required' => false)),
      'letzte_aenderung'       => new sfValidatorDateTime(),
      'angelegt'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('kompetenzen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Kompetenzen';
  }

}
