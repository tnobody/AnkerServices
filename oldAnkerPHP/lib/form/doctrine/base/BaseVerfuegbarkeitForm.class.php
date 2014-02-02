<?php

/**
 * Verfuegbarkeit form base class.
 *
 * @method Verfuegbarkeit getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVerfuegbarkeitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'datum'       => new sfWidgetFormInputHidden(),
      'profil_id'   => new sfWidgetFormInputHidden(),
      'stundenzahl' => new sfWidgetFormInputText(),
      'zeitraum'    => new sfWidgetFormInputText(),
      'anmerkung'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'datum'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('datum')), 'empty_value' => $this->getObject()->get('datum'), 'required' => false)),
      'profil_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('profil_id')), 'empty_value' => $this->getObject()->get('profil_id'), 'required' => false)),
      'stundenzahl' => new sfValidatorInteger(array('required' => false)),
      'zeitraum'    => new sfValidatorPass(array('required' => false)),
      'anmerkung'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('verfuegbarkeit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Verfuegbarkeit';
  }

}
