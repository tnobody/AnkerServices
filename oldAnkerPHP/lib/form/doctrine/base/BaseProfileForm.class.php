<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'profil_id'        => new sfWidgetFormInputHidden(),
      'vornamen'         => new sfWidgetFormInputText(),
      'nachname'         => new sfWidgetFormInputText(),
      'geburtsdatum'     => new sfWidgetFormDate(),
      'geschlecht'       => new sfWidgetFormChoice(array('choices' => array('männlich' => 'männlich', 'weiblich' => 'weiblich'))),
      'angelegt'         => new sfWidgetFormDateTime(),
      'letzte_aenderung' => new sfWidgetFormDateTime(),
      'aktiv'            => new sfWidgetFormInputText(),
      'geburtsort'       => new sfWidgetFormInputText(),
      'geburtsland'      => new sfWidgetFormInputText(),
      'nationalitaet'    => new sfWidgetFormInputText(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'kontaktadresse'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'profil_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('profil_id')), 'empty_value' => $this->getObject()->get('profil_id'), 'required' => false)),
      'vornamen'         => new sfValidatorString(array('max_length' => 255)),
      'nachname'         => new sfValidatorString(array('max_length' => 60)),
      'geburtsdatum'     => new sfValidatorDate(),
      'geschlecht'       => new sfValidatorChoice(array('choices' => array(0 => 'männlich', 1 => 'weiblich'))),
      'angelegt'         => new sfValidatorDateTime(),
      'letzte_aenderung' => new sfValidatorDateTime(),
      'aktiv'            => new sfValidatorInteger(),
      'geburtsort'       => new sfValidatorString(array('max_length' => 100)),
      'geburtsland'      => new sfValidatorString(array('max_length' => 100)),
      'nationalitaet'    => new sfValidatorString(array('max_length' => 100)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'kontaktadresse'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
