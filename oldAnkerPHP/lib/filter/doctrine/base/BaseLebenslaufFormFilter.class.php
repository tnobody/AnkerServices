<?php

/**
 * Lebenslauf filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLebenslaufFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'profil_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => true)),
      'bezeichnung'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'beschreibung'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'letzte_aenderung' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'art_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LebenslaufKategorien'), 'add_empty' => true)),
      'beginn'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ende'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'aktiv'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'angelegt'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'niveaus_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Niveaus')),
    ));

    $this->setValidators(array(
      'profil_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Profile'), 'column' => 'profil_id')),
      'bezeichnung'      => new sfValidatorPass(array('required' => false)),
      'beschreibung'     => new sfValidatorPass(array('required' => false)),
      'letzte_aenderung' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'art_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LebenslaufKategorien'), 'column' => 'art_id')),
      'beginn'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'ende'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'aktiv'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'angelegt'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'niveaus_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Niveaus', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lebenslauf_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addNiveausListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.KompetenzErworbenBei KompetenzErworbenBei')
      ->andWhereIn('KompetenzErworbenBei.niveau_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Lebenslauf';
  }

  public function getFields()
  {
    return array(
      'll_id'            => 'Number',
      'profil_id'        => 'ForeignKey',
      'bezeichnung'      => 'Text',
      'beschreibung'     => 'Text',
      'letzte_aenderung' => 'Date',
      'art_id'           => 'ForeignKey',
      'beginn'           => 'Date',
      'ende'             => 'Date',
      'aktiv'            => 'Number',
      'angelegt'         => 'Date',
      'niveaus_list'     => 'ManyKey',
    );
  }
}
