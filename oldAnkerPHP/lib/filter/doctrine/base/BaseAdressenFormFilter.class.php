<?php

/**
 * Adressen filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdressenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'alias'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'strasse_und_hausnr' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'plz'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ort'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'land'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profil_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => true)),
      'letzte_aenderung'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'angelegt'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'latitude'           => new sfWidgetFormFilterInput(),
      'longitude'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'alias'              => new sfValidatorPass(array('required' => false)),
      'strasse_und_hausnr' => new sfValidatorPass(array('required' => false)),
      'plz'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ort'                => new sfValidatorPass(array('required' => false)),
      'land'               => new sfValidatorPass(array('required' => false)),
      'profil_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Profile'), 'column' => 'profil_id')),
      'letzte_aenderung'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'angelegt'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adressen_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adressen';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'alias'              => 'Text',
      'strasse_und_hausnr' => 'Text',
      'plz'                => 'Number',
      'ort'                => 'Text',
      'land'               => 'Text',
      'profil_id'          => 'ForeignKey',
      'letzte_aenderung'   => 'Date',
      'angelegt'           => 'Date',
      'latitude'           => 'Text',
      'longitude'          => 'Text',
    );
  }
}
