<?php

/**
 * KompetenzKategorien form base class.
 *
 * @method KompetenzKategorien getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKompetenzKategorienForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kompetenz_kategorie_id' => new sfWidgetFormInputHidden(),
      'bezeichnung'            => new sfWidgetFormInputText(),
      'beschreibung'           => new sfWidgetFormInputText(),
      'aktiv'                  => new sfWidgetFormInputText(),
      'root_id'                => new sfWidgetFormInputText(),
      'lft'                    => new sfWidgetFormInputText(),
      'rgt'                    => new sfWidgetFormInputText(),
      'level'                  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'kompetenz_kategorie_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('kompetenz_kategorie_id')), 'empty_value' => $this->getObject()->get('kompetenz_kategorie_id'), 'required' => false)),
      'bezeichnung'            => new sfValidatorString(array('max_length' => 50)),
      'beschreibung'           => new sfValidatorString(array('max_length' => 255)),
      'aktiv'                  => new sfValidatorInteger(array('required' => false)),
      'root_id'                => new sfValidatorInteger(array('required' => false)),
      'lft'                    => new sfValidatorInteger(array('required' => false)),
      'rgt'                    => new sfValidatorInteger(array('required' => false)),
      'level'                  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('kompetenz_kategorien[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'KompetenzKategorien';
  }

}
