<?php

/**
 * Niveaus form base class.
 *
 * @method Niveaus getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNiveausForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'niveau_id'           => new sfWidgetFormInputHidden(),
      'profil_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'kompetenz_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kompetenzen'), 'add_empty' => false)),
      'zertifikat_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zertifikate'), 'add_empty' => true)),
      'erwerb_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrteKompetenzerwerb'), 'add_empty' => true)),
      'art_kompetenzerwerb' => new sfWidgetFormInputText(),
      'niveau'              => new sfWidgetFormInputText(),
      'angelegt'            => new sfWidgetFormDateTime(),
      'letzte_aenderung'    => new sfWidgetFormDateTime(),
      'lebenslauf_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Lebenslauf')),
    ));

    $this->setValidators(array(
      'niveau_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('niveau_id')), 'empty_value' => $this->getObject()->get('niveau_id'), 'required' => false)),
      'profil_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'kompetenz_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Kompetenzen'))),
      'zertifikat_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zertifikate'), 'required' => false)),
      'erwerb_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrteKompetenzerwerb'), 'required' => false)),
      'art_kompetenzerwerb' => new sfValidatorPass(array('required' => false)),
      'niveau'              => new sfValidatorInteger(),
      'angelegt'            => new sfValidatorDateTime(),
      'letzte_aenderung'    => new sfValidatorDateTime(),
      'lebenslauf_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Lebenslauf', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('niveaus[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Niveaus';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lebenslauf_list']))
    {
      $this->setDefault('lebenslauf_list', $this->object->Lebenslauf->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveLebenslaufList($con);

    parent::doSave($con);
  }

  public function saveLebenslaufList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['lebenslauf_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Lebenslauf->getPrimaryKeys();
    $values = $this->getValue('lebenslauf_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Lebenslauf', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Lebenslauf', array_values($link));
    }
  }

}
