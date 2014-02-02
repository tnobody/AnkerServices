<?php

/**
 * Niveaus filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNiveausFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'profil_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => true)),
      'kompetenz_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kompetenzen'), 'add_empty' => true)),
      'zertifikat_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zertifikate'), 'add_empty' => true)),
      'erwerb_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrteKompetenzerwerb'), 'add_empty' => true)),
      'art_kompetenzerwerb' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'niveau'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'angelegt'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'letzte_aenderung'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lebenslauf_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Lebenslauf')),
    ));

    $this->setValidators(array(
      'profil_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Profile'), 'column' => 'profil_id')),
      'kompetenz_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Kompetenzen'), 'column' => 'kompetenz_id')),
      'zertifikat_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zertifikate'), 'column' => 'zertifikat_id')),
      'erwerb_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrteKompetenzerwerb'), 'column' => 'erwerb_id')),
      'art_kompetenzerwerb' => new sfValidatorPass(array('required' => false)),
      'niveau'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'angelegt'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'letzte_aenderung'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lebenslauf_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Lebenslauf', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('niveaus_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLebenslaufListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('KompetenzErworbenBei.ll_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Niveaus';
  }

  public function getFields()
  {
    return array(
      'niveau_id'           => 'Number',
      'profil_id'           => 'ForeignKey',
      'kompetenz_id'        => 'ForeignKey',
      'zertifikat_id'       => 'ForeignKey',
      'erwerb_id'           => 'ForeignKey',
      'art_kompetenzerwerb' => 'Text',
      'niveau'              => 'Number',
      'angelegt'            => 'Date',
      'letzte_aenderung'    => 'Date',
      'lebenslauf_list'     => 'ManyKey',
    );
  }
}
