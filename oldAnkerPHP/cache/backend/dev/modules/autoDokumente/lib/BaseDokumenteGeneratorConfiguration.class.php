<?php

/**
 * dokumente module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage dokumente
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDokumenteGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%id%% - %%profil_id%% - %%titel%% - %%angelegt%% - %%letzte_aenderung%% - %%pfad%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Dokumente List';
  }

  public function getEditTitle()
  {
    return 'Edit Dokumente';
  }

  public function getNewTitle()
  {
    return 'New Dokumente';
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
    return array(  0 => 'id',  1 => 'profil_id',  2 => 'titel',  3 => 'angelegt',  4 => 'letzte_aenderung',  5 => 'pfad',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'profil_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'titel' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'pfad' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'profil_id' => array(),
      'titel' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'pfad' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'profil_id' => array(),
      'titel' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'pfad' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'profil_id' => array(),
      'titel' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'pfad' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'profil_id' => array(),
      'titel' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'pfad' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'profil_id' => array(),
      'titel' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'pfad' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'DokumenteForm';
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
    return 'DokumenteFormFilter';
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
