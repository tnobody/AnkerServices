<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new AnkerservicesTestFunctional(new sfBrowser());
$browser->loadData();
$browser->setTester('doctrine', 'sfTesterDoctrine');

$browser->
    info('1 - Profiltest')->
    get('/profil/index')->
    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'index')->
    end()->

    info('1.1 - Zugang ist geschützt')->
    with('response')->begin()->
        isStatusCode(401)->
        checkElement('body', '!/This is a temporary page/')->
    end()->

    info('1.2 - Anmeldung')->
    click('Anmelden', array(
    'signin' => array('username' => 'student', 'password' => 'test'),
    array('_with_csrf' => true)
    ))->
    with('request')->begin()->
    isParameter('module', 'sfGuardAuth')->
    isParameter('action', 'signin')->
    end()->

    info('1.3 - Anmeldung erfolgreich?')->
    with('response')->isRedirected()->
        followRedirect()->
    info('1.4 - Standardseite korrekt')->
    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'index')->
    end()->

    with('response')->begin()->
        isStatusCode(200)->
    end()->

    info('1.5 - Profil anlegen')->
    click('Neues Profil erstellen')->
    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'new')->
    end()->

    with('response')->begin()->
        isStatusCode(200)->
    end()->

    click('Speichern', array(
    'profile' => array(
        'vornamen' => 'student',
        'nachname' => 'Stanislaus',
        'geburtsdatum' => array(
            'day' => '05',
            'month' => '05',
            'year' => '1975'
        ),
        'geschlecht' => 'männlich',
        'geburtsort' => 'Musterstadt',
        'geburtsland' => 'Mudterland',
        'nationalitaet' => 'deutsch'
    ),
    array('_with_csrf' => true)
    ))->

    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'create')->
    end()->

    with('form')->begin()->
        hasErrors(false)->
    end()->

    with('response')->isRedirected()->
    followRedirect()->

    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'show')->
    end()->

    info('1.6 - Werden die Links richtig angezeigt')->
    get('/profil/index')->
    //click('Zurück zur Übersicht')->
    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'index')->
    end()->

    with('doctrine')->begin()->
        check('Profile', array(
            'profil_id' => 1,
            'sf_guard_user_id' => 2
        ))->
    end()->

    with('user')->begin()->
        isAuthenticated()->
        info('sf_guard_user_id: '. $browser->getUser()->getId())->
        //info('profil_id: '. var_dump($browser->getUser()->getProfil()))->
    end()->

    info('1 - Profiltest')->
    get('/profil/index')->

    with('response')->begin()->
        debug()->
        isStatusCode(200)->
        checkElement('body', '!/This is a temporary page/')->
    end()->

    click('Mein Profil')->
    with('request')->begin()->
        isParameter('module', 'profil')->
        isParameter('action', 'show')->
    end()
;
