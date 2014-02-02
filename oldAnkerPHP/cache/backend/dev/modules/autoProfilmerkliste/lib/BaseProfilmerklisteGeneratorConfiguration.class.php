<?php

/**
 * profilmerkliste module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profilmerkliste
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfilmerklisteGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%merklisten_id%% - %%query%% - %%angelegt%% - %%letzte_aenderung%% - %%sf_guard_user_id%% - %%profil_id%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Profilmerkliste List';
  }

  public function getEditTitle()
  {
    return 'Edit Profilmerkliste';
  }

  public function getNewTitle()
  {
    return 'New Profilmerkliste';
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
    return array(  0 => 'merklisten_id',  1 => 'query',  2 => 'angelegt',  3 => 'letzte_aenderung',  4 => 'sf_guard_user_id',  5 => 'profil_id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'merklisten_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'query' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'sf_guard_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'profil_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'merklisten_id' => array(),
      'query' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'sf_guard_user_id' => array(),
      'profil_id' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'merklisten_id' => array(),
      'query' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'sf_guard_user_id' => array(),
      'profil_id' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'merklisten_id' => array(),
      'query' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'sf_guard_user_id' => array(),
      'profil_id' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'merklisten_id' => array(),
      'query' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'sf_guard_user_id' => array(),
      'profil_id' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'merklisten_id' => array(),
      'query' => array(),
      'angelegt' => array(),
      'letzte_aenderung' => array(),
      'sf_guard_user_id' => array(),
      'profil_id' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ProfilMerklisteForm';
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
    return 'ProfilMerklisteFormFilter';
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
