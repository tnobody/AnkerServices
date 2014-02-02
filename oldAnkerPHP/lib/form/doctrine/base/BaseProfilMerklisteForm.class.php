<?php

/**
 * ProfilMerkliste form base class.
 *
 * @method ProfilMerkliste getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfilMerklisteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'merklisten_id'    => new sfWidgetFormInputHidden(),
      'query'            => new sfWidgetFormTextarea(),
      'angelegt'         => new sfWidgetFormDateTime(),
      'letzte_aenderung' => new sfWidgetFormDateTime(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'merklisten_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('merklisten_id')), 'empty_value' => $this->getObject()->get('merklisten_id'), 'required' => false)),
      'query'            => new sfValidatorString(),
      'angelegt'         => new sfValidatorDateTime(),
      'letzte_aenderung' => new sfValidatorDateTime(),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'profil_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
    ));

    $this->widgetSchema->setNameFormat('profil_merkliste[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilMerkliste';
  }

}
