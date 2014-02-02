<?php

/**
 * kompetenzen module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage kompetenzen
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseKompetenzenGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%kompetenz_id%% - %%bezeichnung%% - %%beschreibung%% - %%kompetenz_kategorie_id%% - %%aktiv%% - %%letzte_aenderung%% - %%angelegt%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Kompetenzen List';
  }

  public function getEditTitle()
  {
    return 'Edit Kompetenzen';
  }

  public function getNewTitle()
  {
    return 'New Kompetenzen';
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
    return array(  0 => 'kompetenz_id',  1 => 'bezeichnung',  2 => 'beschreibung',  3 => 'kompetenz_kategorie_id',  4 => 'aktiv',  5 => 'letzte_aenderung',  6 => 'angelegt',);
  }

  public function getFieldsDefault()
  {
    return array(
      'kompetenz_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'bezeichnung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'beschreibung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'kompetenz_kategorie_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'aktiv' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'kompetenz_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'kompetenz_kategorie_id' => array(),
      'aktiv' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'kompetenz_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'kompetenz_kategorie_id' => array(),
      'aktiv' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'kompetenz_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'kompetenz_kategorie_id' => array(),
      'aktiv' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'kompetenz_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'kompetenz_kategorie_id' => array(),
      'aktiv' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'kompetenz_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'kompetenz_kategorie_id' => array(),
      'aktiv' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'KompetenzenForm';
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
    return 'KompetenzenFormFilter';
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
