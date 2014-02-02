<?php

/**
 * Profile form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  public function configure()
  {
      unset(
        $this['angelegt'], $this['letzte_aenderung'],
        $this['aktiv'], $this['sf_guard_user_id']
      );

      $years = range(date('Y')-100, date('Y')-14);

      //$this->widgetSchema['geburtsdatum'] = new sfWidgetFormI18nDate(array('culture' => 'de_DE', 'years' => array_combine($years, $years)));
	  $this->widgetSchema['geburtsdatum'] = new sfWidgetFormDate(array(	'empty_values' => array(	'year' => 'Jahr:',
																									'month' => 'Monat:',
																									'day' => 'Tag:'
																								),
																		'format' => '%day% %month% %year%',
																		'years' => array_combine($years, $years)));
  }
}
