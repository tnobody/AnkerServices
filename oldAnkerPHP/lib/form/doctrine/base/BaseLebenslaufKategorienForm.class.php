<?php

/**
 * LebenslaufKategorien form base class.
 *
 * @method LebenslaufKategorien getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLebenslaufKategorienForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'art_id'      => new sfWidgetFormInputHidden(),
      'bezeichnung' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'art_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('art_id')), 'empty_value' => $this->getObject()->get('art_id'), 'required' => false)),
      'bezeichnung' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('lebenslauf_kategorien[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LebenslaufKategorien';
  }

}
