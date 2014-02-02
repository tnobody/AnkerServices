<?php

/**
 * Verfuegbarkeit filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVerfuegbarkeitFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'stundenzahl' => new sfWidgetFormFilterInput(),
      'zeitraum'    => new sfWidgetFormFilterInput(),
      'anmerkung'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'stundenzahl' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'zeitraum'    => new sfValidatorPass(array('required' => false)),
      'anmerkung'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('verfuegbarkeit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Verfuegbarkeit';
  }

  public function getFields()
  {
    return array(
      'datum'       => 'Date',
      'profil_id'   => 'Number',
      'stundenzahl' => 'Number',
      'zeitraum'    => 'Text',
      'anmerkung'   => 'Text',
    );
  }
}
