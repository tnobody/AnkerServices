<?php

/**
 * profil module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profil
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfilGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%vornamen%% - %%nachname%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Profile';
  }

  public function getEditTitle()
  {
    return 'Profil bearbeiten';
  }

  public function getNewTitle()
  {
    return 'New Profil';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'vornamen',  1 => 'nachname',);
  }

  public function getFieldsDefault()
  {
    return array(
      'profil_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'vornamen' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nachname' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'geburtsdatum' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'geschlecht' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'aktiv' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'geburtsort' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'geburtsland' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nationalitaet' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sf_guard_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'kontaktadresse' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'profil_id' => array(),
      'vornamen' => array(),
      'nachname' => array(),
      'geburtsdatum' => array(),
      'geschlecht' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'aktiv' => array(),
      'geburtsort' => array(),
      'geburtsland' => array(),
      'nationalitaet' => array(),
      'sf_guard_user_id' => array(),
      'kontaktadresse' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'profil_id' => array(),
      'vornamen' => array(),
      'nachname' => array(),
      'geburtsdatum' => array(),
      'geschlecht' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'aktiv' => array(),
      'geburtsort' => array(),
      'geburtsland' => array(),
      'nationalitaet' => array(),
      'sf_guard_user_id' => array(),
      'kontaktadresse' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'profil_id' => array(),
      'vornamen' => array(),
      'nachname' => array(),
      'geburtsdatum' => array(),
      'geschlecht' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'aktiv' => array(),
      'geburtsort' => array(),
      'geburtsland' => array(),
      'nationalitaet' => array(),
      'sf_guard_user_id' => array(),
      'kontaktadresse' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'profil_id' => array(),
      'vornamen' => array(),
      'nachname' => array(),
      'geburtsdatum' => array(),
      'geschlecht' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'aktiv' => array(),
      'geburtsort' => array(),
      'geburtsland' => array(),
      'nationalitaet' => array(),
      'sf_guard_user_id' => array(),
      'kontaktadresse' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'profil_id' => array(),
      'vornamen' => array(),
      'nachname' => array(),
      'geburtsdatum' => array(),
      'geschlecht' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'aktiv' => array(),
      'geburtsort' => array(),
      'geburtsland' => array(),
      'nationalitaet' => array(),
      'sf_guard_user_id' => array(),
      'kontaktadresse' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ProfileForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'ProfileFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
