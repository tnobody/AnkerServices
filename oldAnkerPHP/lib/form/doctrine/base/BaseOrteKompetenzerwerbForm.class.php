<?php

/**
 * OrteKompetenzerwerb form base class.
 *
 * @method OrteKompetenzerwerb getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrteKompetenzerwerbForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'erwerb_id'   => new sfWidgetFormInputHidden(),
      'bezeichnung' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'erwerb_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('erwerb_id')), 'empty_value' => $this->getObject()->get('erwerb_id'), 'required' => false)),
      'bezeichnung' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('orte_kompetenzerwerb[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrteKompetenzerwerb';
  }

}
