<?php

/**
 * KompetenzKategorien filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKompetenzKategorienFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bezeichnung'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'beschreibung'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'aktiv'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'root_id'                => new sfWidgetFormFilterInput(),
      'lft'                    => new sfWidgetFormFilterInput(),
      'rgt'                    => new sfWidgetFormFilterInput(),
      'level'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'bezeichnung'            => new sfValidatorPass(array('required' => false)),
      'beschreibung'           => new sfValidatorPass(array('required' => false)),
      'aktiv'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'root_id'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lft'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('kompetenz_kategorien_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'KompetenzKategorien';
  }

  public function getFields()
  {
    return array(
      'kompetenz_kategorie_id' => 'Number',
      'bezeichnung'            => 'Text',
      'beschreibung'           => 'Text',
      'aktiv'                  => 'Number',
      'root_id'                => 'Number',
      'lft'                    => 'Number',
      'rgt'                    => 'Number',
      'level'                  => 'Number',
    );
  }
}
