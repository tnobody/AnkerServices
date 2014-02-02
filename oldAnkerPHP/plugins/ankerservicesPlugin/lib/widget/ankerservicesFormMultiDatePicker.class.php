<?php

/**
 * Eine für das AnkerServices-Projekt angepasste Version von 
 * sfWidgetFormJQueryDate.
 *
 * Benötigt werden JQuery, JQuery UI und den DatePicker von Kevin Luck.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Stefan Hanauska
 * @version    SVN: $Id: ankerservicesFormMultiDatePicker.class.php$
 */
class ankerservicesFormMultiDatePicker extends sfWidgetForm
{
  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *  * image:       The image path to represent the widget (false by default)
   *  * config:      A JavaScript array that configures the JQuery date widget
   *  * culture:     The user culture
   *  * date_widget: The date widget instance to use as a "base" class
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('image', false);
    $this->addOption('config', '{}');
    $this->addOption('culture', '');
    $this->addOption('csrf_token', '');
    $this->addOption('profil_id', '');
    $this->addOption('date_widget', new sfWidgetFormDate());
    $this->addOption('selectedDates', array());

    parent::configure($options, $attributes);

    if ('en' == $this->getOption('culture'))
    {
      $this->setOption('culture', 'en');
    }
  }

  /**
   * @param  string $name        Name des Elements
   * @param  string $value       Das vorgegebene Datum
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $prefix = str_replace('-', '_', $this->generateId($name));

    $image = '';
    if (false !== $this->getOption('image'))
    {
      $image = sprintf(', buttonImage: "%s", buttonImageOnly: true', $this->getOption('image'));
    }

    if ($this->getOption('date_widget') instanceof sfWidgetFormDateTime)
    {
      $years = $this->getOption('date_widget')->getDateWidget()->getOption('years');
    }
    else
    {
      $years = $this->getOption('date_widget')->getOption('years');
    }

    $csrf_token = $this->getOption('csrf_token');
    $profil_id = $this->getOption('profil_id');
    $selectedDates = $this->getOption('selectedDates')->getRawValue();

$selecter="";

foreach($selectedDates as $sd) {
	//$selecter.="$('.turn-me-into-datepicker').dpSetSelected(\"$sd\", true, false, false);\n";
	$selecter.="\$(this).dpmmSetSelected(\"".substr($sd,8,2)."/".substr($sd,5,2)."/".substr($sd,0,4)."\",true);";
}

    return sprintf(<<<EOF
<script lang="javascript">
$(function()
{
$('.turn-me-into-datepicker')
	.bind('dpLoadSelectedDates',
                function() {
                        $selecter
                }
        )
	.datePickerMultiMonth({
		inline:true,
		selectMultiple: true,
		numMonths: 3 
	 })
	.bind(
		'click',
		function() {
			\$(this).dpDisplay();
			this.blur();
			return false;
		}
	)
	.bind(
		'dateSelected',
		function(e, selectedDate, \$td, state) {
			if(state) {
				\$.post("/frontend_employee_dev.php/verfuegbarkeit/create", 
					{ "verfuegbarkeit[datum][day]": selectedDate.getDate(), "verfuegbarkeit[datum][month]": (selectedDate.getMonth()+1), "verfuegbarkeit[datum][year]": selectedDate.getFullYear(), "verfuegbarkeit[_csrf_token]": "$csrf_token" }); 
			} else {
				\$.post("/frontend_employee_dev.php/verfuegbarkeit/delete/datum/"+ selectedDate.getFullYear()+"-"+(selectedDate.getMonth()+1)+"-"+selectedDate.getDate()+"/profil_id/$profil_id", {"_csrf_token": "$csrf_token" });
			}
		}
	);
});
</script>
<div class="turn-me-into-datepicker">Hier erscheint der Datepicker.<div class="clearer"></div></div>

EOF
);
  }
}
