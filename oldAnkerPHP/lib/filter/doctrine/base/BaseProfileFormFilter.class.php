<?php

/**
 * Profile filter form base class.
 *
 * @package    ankerservices
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'vornamen'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nachname'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'geburtsdatum'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'geschlecht'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'männlich' => 'männlich', 'weiblich' => 'weiblich'))),
      'angelegt'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'letzte_aenderung' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'aktiv'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'geburtsort'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'geburtsland'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nationalitaet'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'kontaktadresse'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'vornamen'         => new sfValidatorPass(array('required' => false)),
      'nachname'         => new sfValidatorPass(array('required' => false)),
      'geburtsdatum'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'geschlecht'       => new sfValidatorChoice(array('required' => false, 'choices' => array('männlich' => 'männlich', 'weiblich' => 'weiblich'))),
      'angelegt'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'letzte_aenderung' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'aktiv'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'geburtsort'       => new sfValidatorPass(array('required' => false)),
      'geburtsland'      => new sfValidatorPass(array('required' => false)),
      'nationalitaet'    => new sfValidatorPass(array('required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'kontaktadresse'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'profil_id'        => 'Number',
      'vornamen'         => 'Text',
      'nachname'         => 'Text',
      'geburtsdatum'     => 'Date',
      'geschlecht'       => 'Enum',
      'angelegt'         => 'Date',
      'letzte_aenderung' => 'Date',
      'aktiv'            => 'Number',
      'geburtsort'       => 'Text',
      'geburtsland'      => 'Text',
      'nationalitaet'    => 'Text',
      'sf_guard_user_id' => 'ForeignKey',
      'kontaktadresse'   => 'Number',
    );
  }
}
