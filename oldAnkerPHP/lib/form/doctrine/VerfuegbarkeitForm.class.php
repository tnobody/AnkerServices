<?php

/**
 * Verfuegbarkeit form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Stefan Hanauska
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VerfuegbarkeitForm extends BaseVerfuegbarkeitForm {
	public function configure() {
		// Noch anzupassen
		$this->widgetSchema['datum'] = new ankerservicesFormMultiDatePicker(array('culture'=>'de', 'csrf_token' => $this->getCSRFToken(), 'profil_id' => 1 ));
		$this->validatorSchema['datum'] = new sfValidatorDate();
		unset($this['profil_id'], $this['stundenzahl'], $this['anmerkung'], $this['zeitraum']);
	}

	public function setSelectedDates($seld) {
		$this->widgetSchema['datum'] = new ankerservicesFormMultiDatePicker(array('culture'=>'de', 'csrf_token' => $this->getCSRFToken(), 'profil_id' => 1, 'selectedDates' => $seld ));
	}
}
