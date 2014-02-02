<?php

/**
 * profil_merkliste actions.
 *
 * @package    ankerservices
 * @subpackage profil_merkliste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profil_merklisteActions extends sfActions {


    public function executeIndex(sfWebRequest $request) {

        // Hole alle Einträge aus der Favoritenliste, die zum eingeloggten User
        // gehören
        $q = Doctrine_Core::getTable('ProfilMerkliste')
                ->createQuery('p')
                ->select('DISTINCT(p.profil_id) as profil_id')
                ->where('p.sf_guard_user_id = ?', $this->getUser()->getId());

        $res = $q->execute();

        $entries = $res->toArray();

        // Liste die zurückgegeben wird
        $list = array();
        $i = 0;

        foreach ($entries as $entry) {

            $profil = array();

            $profil['profil_id'] = $entry['profil_id'];

            // Fasse alle Suchanfragen, die zu einem bestimmten Profil geführt 
            // haben zusammen
            $queries = Doctrine_Core::getTable('ProfilMerkliste')
                    ->createQuery('p')
                    ->select('p.query')
                    ->where('p.sf_guard_user_id = ?', $this->getUser()->getId())
                    ->andWhere('p.profil_id = ?', $profil['profil_id'])
                    ->execute();
            $queries = $queries->toArray();

            // Liste mit allen Suchbegriffen, die zu diesem Profil geführt haben
            $qstring = "";

            foreach ($queries as $query) {
                $qstring .= $query['query'] . ",";
            }

            // Hole für die zusammengefassten Suchbegriffe alle Bezeichnungen 
            // der entsprechenden Kompetenz(kategorien) aus der DB
            list($kk_ids, $k_ids) = AsLib::createKompetenzIdsFromQueryParam($qstring);
            
            // Es muss mindestens ein Element in $k_ids sein, dass die 
            // whereIn Klausel funktioniert, wie sie soll
            if ($k_ids) {
                $q = Doctrine_Core::getTable('Kompetenzen')
                    ->createQuery('k')
                    ->select('k.bezeichnung')
                    ->whereIn('kompetenz_id', $k_ids)
                    ->execute();
                $k_searched = $q->toArray();
            } else {
                $k_searched = array();
            }

            // Es muss mindestens ein Element in $kk_ids sein, dass die 
            // whereIn Klausel funktioniert, wie sie soll
            if ($kk_ids) {
                $q = Doctrine_Core::getTable('KompetenzKategorien')
                        ->createQuery('kk')
                        ->select('kk.bezeichnung')
                        ->whereIn('kompetenz_kategorie_id', $kk_ids)
                        ->execute();
                $kk_searched = $q->toArray();
            } else {
                $kk_searched = array();
            }

            $profil['kompetenzen_searched'] = array_merge($k_searched, $kk_searched);
            
            // Wenn noch Suchbegriffe vorhanden
            $result = Doctrine_Core::getTable('Kompetenzen')
                    ->getAllFromDatabaseDependingOn($kk_ids, $k_ids);

            // Alle Kompetenzids aus dem query
            $profil['kompetenz_ids'] = $result;

            $kompetenzen = Doctrine_Core::getTable('Kompetenzen')
                    ->getKompetenzenByProfilId($profil['profil_id'], true);

            $profil['kompetenzen'] = $kompetenzen;

            $verfuegbarkeiten = Doctrine_Core::getTable('Verfuegbarkeit')
                    ->getVerfuegbarkeitenByProfilId($profil['profil_id']);

            // Acht Einträge wegen 7 = Samstag
            $verfuegbarkeiten_arr = array(0, 0, 0, 0, 0, 0, 0, 0);
            // Maxmiale Verfügbarkeit in Tagen
            $maximum = 0;

            foreach ($verfuegbarkeiten as $value) {
                $verfuegbarkeiten_arr[$value['wochentag']] = $value['anzahl'];
                if ($value['anzahl'] > $maximum) {
                    $maximum = $value['anzahl'];
                }
            }

            $verfuegbarkeiten_arr['maximum'] = $maximum;

            $profil['verfuegbarkeiten'] = $verfuegbarkeiten_arr;

            // Existiert bereits eine Anfrage nach diesem Profil?
            $anfrage_existiert = count(Doctrine::getTable('Anfragen')
                            ->findByProfilIdAndSfGuardUserId(
                                    $profil['profil_id'], $this->getUser()->getId()
                            ));

            $profil['anfrage_existiert'] = $anfrage_existiert;

            $list[$i++] = $profil;
        }

        $wochentage = array(
            'Mo' => 2,
            'Di' => 3,
            'Mi' => 4,
            'Do' => 5,
            'Fr' => 6,
            'Sa' => 7,
            'So' => 1
        );

        if (empty($list)) {
            $this->setVar('no_entries', true);
        } else {
            $this->niveaustufen = sfYaml::load(sfConfig::get('sf_config_dir') . '/app_data.yml');
            $this->niveaustufen = $this->niveaustufen['Niveaustufen'];

            $this->setVar('no_entries', false);
            $this->setVar('entries', $list);
            $this->setVar('wochentage', $wochentage);
        }
    }

    // Erstelle einen Eintrag in der Favoritenliste 
    public function executeCreate(sfWebRequest $request) {
        // only execute if is an ajax request  
        if ($request->isXmlHttpRequest()) {

            $this->getResponse()->setContentType('application/json');

            $entry = new ProfilMerkliste();  

            // Überprüfe die korrekte Form des Parameters
            // TODO dieser Ausdruck überprüft nur einen einzelnen Suchbegriff
            $query = $request->getParameter('query');
            if (!preg_match('/([k]{1,2}_\d+)/', $query)) {
                return $this->renderText(json_encode(false));
            }

            $entry->setQuery($query);
            $entry->setProfilId($request->getParameter('id'));
            $entry->setSfGuardUserId($this->getUser()->getGuardUser());

            try {
                $entry->save();
                return $this->renderText(json_encode(true));
            } catch (Exception $e) {
                return $this->renderText(json_encode(false));
            }
        } else {
            $this->forward404();
        }
    }

    // Löscht einen Eintrag aus der Favoritenliste
    public function executeDelete(sfWebRequest $request) {
        // only execute if it is an ajax request  
        if ($request->isXmlHttpRequest()) {

            $this->getResponse()->setContentType('application/json');

            $entry = Doctrine_Core::getTable('ProfilMerkliste')
                    ->findByProfilId(array($request->getParameter('id')));

            if ($entry) {
                try {
                    // Der angemeldete User darf nur seine eigenen Einträge
                    // löschen
                    $q = Doctrine_Query::create()
                            ->delete('ProfilMerkliste pm')
                            ->where('pm.profil_id = ?', $request->getParameter('id'))
                            ->andWhere('pm.sf_guard_user_id = ?', $this->getUser()->getId());
                    $q->execute();
                } catch (Exception $e) {
                    return $this->renderText(json_encode(false));
                }
                return $this->renderText(json_encode(true));
            } else {
                return $this->renderText(json_encode(false));
            }
        } else {
            $this->forward404();
        }
    }

}

