<?php

/**
 * Kompetenzen form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Stefan Hanauska
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class KompetenzenForm extends BaseKompetenzenForm
{
  public function configure()
  {
	unset($this['angelegt'],$this['profil_id'],$this['letzte_aenderung']);//,$this['aktiv']);
	$this->widgetSchema['kompetenz_kategorie_id']= new sfWidgetFormDoctrineChoiceNestedSet(array('model'=>$this->getRelatedModelName('KompetenzKategorien'), 'add_empty'=>true, 'method' => 'getBezeichnung'));


  }
}
