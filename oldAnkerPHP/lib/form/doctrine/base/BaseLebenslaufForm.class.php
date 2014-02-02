<?php

/**
 * Lebenslauf form base class.
 *
 * @method Lebenslauf getObject() Returns the current form's model object
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLebenslaufForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'll_id'            => new sfWidgetFormInputHidden(),
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'bezeichnung'      => new sfWidgetFormInputText(),
      'beschreibung'     => new sfWidgetFormTextarea(),
      'letzte_aenderung' => new sfWidgetFormDateTime(),
      'art_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LebenslaufKategorien'), 'add_empty' => true)),
      'beginn'           => new sfWidgetFormDate(),
      'ende'             => new sfWidgetFormDate(),
      'aktiv'            => new sfWidgetFormInputText(),
      'angelegt'         => new sfWidgetFormDateTime(),
      'niveaus_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Niveaus')),
    ));

    $this->setValidators(array(
      'll_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ll_id')), 'empty_value' => $this->getObject()->get('ll_id'), 'required' => false)),
      'profil_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'bezeichnung'      => new sfValidatorString(array('max_length' => 255)),
      'beschreibung'     => new sfValidatorString(),
      'letzte_aenderung' => new sfValidatorDateTime(),
      'art_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LebenslaufKategorien'), 'required' => false)),
      'beginn'           => new sfValidatorDate(),
      'ende'             => new sfValidatorDate(array('required' => false)),
      'aktiv'            => new sfValidatorInteger(),
      'angelegt'         => new sfValidatorDateTime(),
      'niveaus_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Niveaus', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lebenslauf[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lebenslauf';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['niveaus_list']))
    {
      $this->setDefault('niveaus_list', $this->object->Niveaus->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveNiveausList($con);

    parent::doSave($con);
  }

  public function saveNiveausList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['niveaus_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Niveaus->getPrimaryKeys();
    $values = $this->getValue('niveaus_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Niveaus', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Niveaus', array_values($link));
    }
  }

}
