<?php

/**
 * KompetenzKategorien form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Stefan Hanauska
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class KompetenzKategorienForm extends BaseKompetenzKategorienForm
{
  public function configure()
  {
	$this->setWidget('parent', new sfWidgetFormDoctrineChoiceNestedSet(array('model'=>'KompetenzKategorien', 'add_empty' => true, 'method' => 'getBezeichnung')));

	if($this->getObject()->getNode()->hasParent()) {
		$this->setDefault('parent', $this->getObject()->getNode()->getParent()->getKompetenzKategorieId());
	}

	$this->useFields(array('bezeichnung','parent'));

	$this->widgetSchema->setLabels(array('bezeichnung'=>'Kategorie', 'parent'=>'Übergeordnete Kategorie'));

	$this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array('required' => false, 'model' => 'KompetenzKategorien', 'node' => $this->getObject())));

	$this->getValidator('parent')->setMessage('node','Eine Kategorie kann nicht als ihre eigene Unterkategorie eingeordnet werden.');
  }

  public function doSave($con = null) {
	parent::doSave($con);

	if($this->getValue('parent')) {
		$parent = Doctrine::getTable('KompetenzKategorien')->findOneBykompetenz_kategorie_id($this->getValue('parent'));
		if($this->isNew()) {
			$this->getObject()->getNode()->insertAsLastChildOf($parent);
		} else {
			$this->getObject()->getNode()->moveAsLastChildOf($parent);
		}
	} else {
		$tree = Doctrine::getTable('KompetenzKategorien')->getTree();
		if($this->isNew()) {
			$tree->createRoot($this->getObject());
		} else {
			$this->getObject()->getNode()->makeRoot($this->getObject()->getkompetenz_kategorie_id());
		}
	}
  }
}
