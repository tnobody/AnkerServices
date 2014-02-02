<?php

/**
 * adressen module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage adressen
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdressenGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%id%% - %%alias%% - %%strasse_und_hausnr%% - %%plz%% - %%ort%% - %%land%% - %%profil_id%% - %%letzte_aenderung%% - %%angelegt%% - %%latitude%% - %%longitude%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Adressen List';
  }

  public function getEditTitle()
  {
    return 'Edit Adressen';
  }

  public function getNewTitle()
  {
    return 'New Adressen';
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
    return array(  0 => 'id',  1 => 'alias',  2 => 'strasse_und_hausnr',  3 => 'plz',  4 => 'ort',  5 => 'land',  6 => 'profil_id',  7 => 'letzte_aenderung',  8 => 'angelegt',  9 => 'latitude',  10 => 'longitude',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'alias' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'strasse_und_hausnr' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'plz' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'ort' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'land' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'profil_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'letzte_aenderung' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'angelegt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'latitude' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'longitude' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'alias' => array(),
      'strasse_und_hausnr' => array(),
      'plz' => array(),
      'ort' => array(),
      'land' => array(),
      'profil_id' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
      'latitude' => array(),
      'longitude' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'alias' => array(),
      'strasse_und_hausnr' => array(),
      'plz' => array(),
      'ort' => array(),
      'land' => array(),
      'profil_id' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
      'latitude' => array(),
      'longitude' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'alias' => array(),
      'strasse_und_hausnr' => array(),
      'plz' => array(),
      'ort' => array(),
      'land' => array(),
      'profil_id' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
      'latitude' => array(),
      'longitude' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'alias' => array(),
      'strasse_und_hausnr' => array(),
      'plz' => array(),
      'ort' => array(),
      'land' => array(),
      'profil_id' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
      'latitude' => array(),
      'longitude' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'alias' => array(),
      'strasse_und_hausnr' => array(),
      'plz' => array(),
      'ort' => array(),
      'land' => array(),
      'profil_id' => array(),
      'letzte_aenderung' => array(),
      'angelegt' => array(),
      'latitude' => array(),
      'longitude' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'AdressenForm';
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
    return 'AdressenFormFilter';
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
