<?php

/**
 * anfragen module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage anfragen
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAnfragenGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%anfrage_id%% - %%sf_guard_user_id%% - %%kommentar%% - %%profil_id%% - %%angelegt%% - %%letzte_aenderung%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Anfragen List';
  }

  public function getEditTitle()
  {
    return 'Edit Anfragen';
  }

  public function getNewTitle()
  {
    return 'New Anfragen';
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
    return array(  0 => 'anfrage_id',  1 => 'sf_guard_user_id',  2 => 'kommentar',  3 => 'profil_id',  4 => 'angelegt',  5 => 'letzte_aenderung',);
  }

  public function getFieldsDefault()
  {
    return array(
      'anfrage_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sf_guard_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'kommentar' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'profil_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'anfrage_id' => array(),
      'sf_guard_user_id' => array(),
      'kommentar' => array(),
      'profil_id' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'anfrage_id' => array(),
      'sf_guard_user_id' => array(),
      'kommentar' => array(),
      'profil_id' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'anfrage_id' => array(),
      'sf_guard_user_id' => array(),
      'kommentar' => array(),
      'profil_id' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'anfrage_id' => array(),
      'sf_guard_user_id' => array(),
      'kommentar' => array(),
      'profil_id' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'anfrage_id' => array(),
      'sf_guard_user_id' => array(),
      'kommentar' => array(),
      'profil_id' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'AnfragenForm';
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
    return 'AnfragenFormFilter';
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
