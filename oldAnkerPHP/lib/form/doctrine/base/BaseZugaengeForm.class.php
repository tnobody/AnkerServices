<?php

/**
 * Zugaenge form base class.
 *
 * @method Zugaenge getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZugaengeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormInputHidden(),
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('sf_guard_user_id')), 'empty_value' => $this->getObject()->get('sf_guard_user_id'), 'required' => false)),
      'profil_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Zugaenge', 'column' => array('profil_id')))
    );

    $this->widgetSchema->setNameFormat('zugaenge[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zugaenge';
  }

}
