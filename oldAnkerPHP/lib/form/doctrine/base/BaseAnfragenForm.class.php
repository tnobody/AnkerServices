<?php

/**
 * Anfragen form base class.
 *
 * @method Anfragen getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnfragenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'anfrage_id'       => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'kommentar'        => new sfWidgetFormTextarea(),
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'angelegt'         => new sfWidgetFormDateTime(),
      'letzte_aenderung' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'anfrage_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('anfrage_id')), 'empty_value' => $this->getObject()->get('anfrage_id'), 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'kommentar'        => new sfValidatorString(),
      'profil_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'angelegt'         => new sfValidatorDateTime(),
      'letzte_aenderung' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('anfragen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anfragen';
  }

}
