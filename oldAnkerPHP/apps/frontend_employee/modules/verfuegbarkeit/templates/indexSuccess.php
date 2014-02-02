<h2>Verfügbarkeit</h2>

<p>Bitte wählen Sie hier diejenigen Termine aus, an denen Sie (zumindest zeitweise) verfügbar sind. <br />
Durch nochmaliges Klicken auf ein Datum können Sie das angewählte Datum wieder aus Ihrer Verfügbarkeitsliste löschen. <br /><br />
<b>Ihre Eingaben werden sofort gespeichert.</b><br />
Unsere Eingabehilfe leitet Sie stets zu dem Termin, an dem Sie Ihre letzte Verfügbarkeit eingetragen haben.</p><br />

<?php 
$selectedDates = array();
foreach ($verfuegbarkeits as $verfuegbarkeit) {
	$selectedDates[]= $verfuegbarkeit->getDatum();
}

include_partial('form', array('form' => $form, 'selectedDates' => $selectedDates)); 
?>
