<?php

/**
 * Lebenslauf form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Stefan Hanauska
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LebenslaufForm extends BaseLebenslaufForm
{
  public function configure()
  {

	unset($this['angelegt'], $this['letzte_aenderung'],
        $this['aktiv'], $this['profil_id']);

	$years = range(date('Y')-100, date('Y')+5);

	// das ist noch sehr unschön, um die Eingabefelder nicht anzuzeigen

	$this->widgetSchema['beginn'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['ende'] = new sfWidgetFormInputHidden();

	// die Einbindung des Templates sollte noch auf andere Weise umgesetzt werden

	$this->widgetSchema['zeitraum'] = new sfWidgetFormDateRange ( array( 'from_date' => new sfWidgetFormI18nDate(array('culture' => 'de_DE', 'years' => array_combine($years, $years))), 'to_date' => new sfWidgetFormI18nDate(array('culture' => 'de_DE', 'years' => array_combine($years, $years))), 'template' => 'Von %from_date% bis %to_date%' ));

	$this->widgetSchema['art_id']= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LebenslaufKategorien'), 'add_empty' => true, 'method' => 'getBezeichnung'));

/*        $this->widgetSchema['kompetenzen_list'] =
                new sfWidgetFormDoctrineChoice(
                        array('multiple' => true, 'model' => 'Kompetenzen',
                            'query' =>
                            Doctrine::getTable('Kompetenzen')->createQuery('k')->andWhere('k.profil_id= ?', $sf_user->getProfile()->getProfilId() )->execute() ));
*/
	$this->validatorSchema['zeitraum'] = new sfValidatorDateRange( array('from_date' => new sfValidatorDate(), 'to_date' => new sfValidatorDate(array('required' => false))), 
                array('invalid' => 'Das Startdatum muss zeitlich vor dem Enddatum liegen'));

	$this->validatorSchema['beginn'] = new sfValidatorPass();
	$this->validatorSchema['ende'] = new sfvalidatorPass();

        //$this->validatorSchema['kompetenzen_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Kompetenzen', 'required' => false));
	
	// ------------------------  TEST  ---------------------------------------
	// $this->widgetSchema->setLabel('beschreibung', 'Test1'); //works
	// $this->widgetSchema->setLabel('bezeichnung', 'Test2');  //works
	
	// $this->setDefault('beschreibung', 'Your Description here...'); //works
	// -----------------------------------------------------------------------
  }

  public function updateDefaultsFromObject() {
	parent::updateDefaultsFromObject();

	if(isset($this->widgetSchema['zeitraum'])) {
		$this->setDefault('zeitraum', array('from' => $this->getObject()->getBeginn(), 'to' => $this->getObject()->getEnde()));
	}
  }

  public function processValues($values) {
	$values = parent::processValues($values);

	$values['beginn'] = $values['zeitraum']['from'];
	$values['ende'] = $values['zeitraum']['to'];
	
	return $values;
  }

}
