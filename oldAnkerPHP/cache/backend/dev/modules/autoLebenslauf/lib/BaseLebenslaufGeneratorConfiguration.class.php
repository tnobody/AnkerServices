<?php

/**
 * lebenslauf module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage lebenslauf
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLebenslaufGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%ll_id%% - %%profil_id%% - %%bezeichnung%% - %%beschreibung%% - %%letzte_aenderung%% - %%art_id%% - %%beginn%% - %%ende%% - %%aktiv%% - %%angelegt%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lebenslauf List';
  }

  public function getEditTitle()
  {
    return 'Edit Lebenslauf';
  }

  public function getNewTitle()
  {
    return 'New Lebenslauf';
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
    return array(  0 => 'll_id',  1 => 'profil_id',  2 => 'bezeichnung',  3 => 'beschreibung',  4 => 'letzte_aenderung',  5 => 'art_id',  6 => 'beginn',  7 => 'ende',  8 => 'aktiv',  9 => 'angelegt',);
  }

  public function getFieldsDefault()
  {
    return array(
      'll_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'profil_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'bezeichnung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'beschreibung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'art_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'beginn' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'ende' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'aktiv' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'niveaus_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'll_id' => array(),
      'profil_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'letzte_aenderung' => array(),
      'art_id' => array(),
      'beginn' => array(),
      'ende' => array(),
      'aktiv' => array(),
      'angelegt' => array(),
      'niveaus_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'll_id' => array(),
      'profil_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'letzte_aenderung' => array(),
      'art_id' => array(),
      'beginn' => array(),
      'ende' => array(),
      'aktiv' => array(),
      'angelegt' => array(),
      'niveaus_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'll_id' => array(),
      'profil_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'letzte_aenderung' => array(),
      'art_id' => array(),
      'beginn' => array(),
      'ende' => array(),
      'aktiv' => array(),
      'angelegt' => array(),
      'niveaus_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'll_id' => array(),
      'profil_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'letzte_aenderung' => array(),
      'art_id' => array(),
      'beginn' => array(),
      'ende' => array(),
      'aktiv' => array(),
      'angelegt' => array(),
      'niveaus_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'll_id' => array(),
      'profil_id' => array(),
      'bezeichnung' => array(),
      'beschreibung' => array(),
      'letzte_aenderung' => array(),
      'art_id' => array(),
      'beginn' => array(),
      'ende' => array(),
      'aktiv' => array(),
      'angelegt' => array(),
      'niveaus_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'LebenslaufForm';
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
    return 'LebenslaufFormFilter';
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
