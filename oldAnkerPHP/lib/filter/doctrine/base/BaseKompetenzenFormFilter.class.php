<?php

/**
 * Kompetenzen filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKompetenzenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bezeichnung'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'beschreibung'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kompetenz_kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('KompetenzKategorien'), 'add_empty' => true)),
      'aktiv'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'letzte_aenderung'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'angelegt'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'bezeichnung'            => new sfValidatorPass(array('required' => false)),
      'beschreibung'           => new sfValidatorPass(array('required' => false)),
      'kompetenz_kategorie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('KompetenzKategorien'), 'column' => 'kompetenz_kategorie_id')),
      'aktiv'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'letzte_aenderung'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'angelegt'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('kompetenzen_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Kompetenzen';
  }

  public function getFields()
  {
    return array(
      'kompetenz_id'           => 'Number',
      'bezeichnung'            => 'Text',
      'beschreibung'           => 'Text',
      'kompetenz_kategorie_id' => 'ForeignKey',
      'aktiv'                  => 'Number',
      'letzte_aenderung'       => 'Date',
      'angelegt'               => 'Date',
    );
  }
}
