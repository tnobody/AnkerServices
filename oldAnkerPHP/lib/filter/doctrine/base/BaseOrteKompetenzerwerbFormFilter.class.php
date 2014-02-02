<?php

/**
 * OrteKompetenzerwerb filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrteKompetenzerwerbFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bezeichnung' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'bezeichnung' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('orte_kompetenzerwerb_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrteKompetenzerwerb';
  }

  public function getFields()
  {
    return array(
      'erwerb_id'   => 'Number',
      'bezeichnung' => 'Text',
    );
  }
}
