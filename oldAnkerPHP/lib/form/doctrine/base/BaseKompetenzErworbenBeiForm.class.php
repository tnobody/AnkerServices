<?php

/**
 * KompetenzErworbenBei form base class.
 *
 * @method KompetenzErworbenBei getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKompetenzErworbenBeiForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'll_id'     => new sfWidgetFormInputHidden(),
      'niveau_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'll_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ll_id')), 'empty_value' => $this->getObject()->get('ll_id'), 'required' => false)),
      'niveau_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('niveau_id')), 'empty_value' => $this->getObject()->get('niveau_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('kompetenz_erworben_bei[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'KompetenzErworbenBei';
  }

}
