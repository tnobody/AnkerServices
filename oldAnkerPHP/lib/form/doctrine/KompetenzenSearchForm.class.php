<?php

/**
 * Kompetenzen Search form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Andreas Hanauska
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class KompetenzenSearchForm extends BaseKompetenzenForm
{
  public function configure()
  {
	$this->useFields(array('bezeichnung'));
        $this->disableLocalCSRFProtection();
  }
}
