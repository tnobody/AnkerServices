<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new AnkerservicesTestFunctional(new sfBrowser());
$browser->loadData();

$browser->
  info('1 - Logintest')->
  get('/')->
  info('1.1 - Login in Admininterface')->
  with('request')->begin()->
    isParameter('module', 'sfGuardUser')->
    isParameter('action', 'index')->
  end()->
  
  info('1.2 - Zugang ist geschützt')->
  with('response')->begin()->
    isStatusCode(401)->
    checkElement('body', '!/This is a temporary page/')->
  end()->
  
  info('1.3 - Anmeldung')->
  click('Anmelden', array(
    'signin' => array('username' => 'admin', 'password' => 'test'),
    array('_with_csrf' => true)
  ))->
  with('request')->begin()->
    isParameter('module', 'sfGuardAuth')->
    isParameter('action', 'signin')->
  end()->
  info('1.4 - Anmeldung erfolgreich?')->  
  followRedirect()->  
  info('1.5 - Standardseite korrekt')->
  with('request')->begin()->
    isParameter('module', 'sfGuardUser')->
    isParameter('action', 'index')->
  end()->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->
  
  info('1.6 - Abmeldung')->
  click('Abmelden')->
  with('request')->begin()->
    isParameter('module', 'sfGuardAuth')->
    isParameter('action', 'signout')->
  end()->
  info('1.7 - Abmeldung erfolgreich?')->  
  followRedirect()->
  with('request')->begin()->
    isParameter('module', 'sfGuardUser')->
    isParameter('action', 'index')->
  end()->
  
  with('response')->begin()->
    isStatusCode(401)->
  end()->
  
  info('1.8 - Anmeldung mit Remeber Me-Funktion')->
  select('signin[remember]')->
  click('Anmelden', array(
    'signin' => array('username' => 'admin', 'password' => 'test'),
    array('_with_csrf' => true)
  ))->
  with('request')->begin()->
    isParameter('module', 'sfGuardAuth')->
    isParameter('action', 'signin')->
  end()->
  info('1.9 - Anmeldung erfolgreich?')->  
  followRedirect()->  
  info('1.10 - Standardseite korrekt')->
  with('request')->begin()->
    isParameter('module', 'sfGuardUser')->
    isParameter('action', 'index')->
    hasCookie($browser->getRememberKey())->
  end()->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->
  
  info('1.11 - Browser neu starten')->
  restart()->
  
  info('1.12 - Remember Me Funktion überprüfen')->
  get('/guard/users')->
  info('1.13 - Userübersicht ohne Authentifizierung aufrufbar?')->
  with('request')->begin()->
    isParameter('module', 'sfGuardUser')->
    isParameter('action', 'index')->
    hasCookie($browser->getRememberKey())->
  end()->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

?>
