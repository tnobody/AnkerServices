<?php

/**
 * Zertifikate filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZertifikateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bezeichnung'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'beschreibung'  => new sfWidgetFormFilterInput(),
      'link'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'bezeichnung'   => new sfValidatorPass(array('required' => false)),
      'beschreibung'  => new sfValidatorPass(array('required' => false)),
      'link'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zertifikate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zertifikate';
  }

  public function getFields()
  {
    return array(
      'zertifikat_id' => 'Number',
      'bezeichnung'   => 'Text',
      'profil_id'     => 'Number',
      'beschreibung'  => 'Text',
      'link'          => 'Text',
    );
  }
}
