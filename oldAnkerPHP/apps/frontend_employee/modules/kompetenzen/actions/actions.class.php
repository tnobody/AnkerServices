<?php

/**
 * kompetenzen actions.
 *
 * @package    ankerservices
 * @subpackage kompetenzen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kompetenzenActions extends sfActions {

    public function executeNew(sfWebRequest $request) {
        $form = new NiveausForm();
        $this->token = $form->getCSRFToken();
        $this->niveaustufen = sfYaml::load(sfConfig::get('sf_config_dir') . '/app_data.yml');
        $this->niveaustufen = $this->niveaustufen['Niveaustufen'];
    }

    public function executeCreate(sfWebRequest $request) {

        // only execute if is an ajax request  
        if ($request->isXmlHttpRequest()) {

            $this->getResponse()->setContentType('application/json');

            $new = $request->getParameter('new_kompetenz', false);

            if ($new) {
                $kategorie = $request->getParameter('kategorie', null);
                $name = $request->getParameter('name', null);
                if (!$name && !$kategorie) {
                    return $this->renderText(json_encode('Parameter nicht korrekt'));
                }

                //sfFirePHP::getInstance(true)->fb($kategorie);
                //sfFirePHP::getInstance(true)->fb($name);
                // Wenn eine Neue Kompetenz angelegt werden soll und eine
                // übergeordnete Kategorie angegeben wurde
                if ($name && $kategorie) {
                    // Existiert bereits eine solche Kategorie?
                    $kat_existiert = Doctrine::getTable('KompetenzKategorien')
                            ->findOneByBezeichnung($name);

                    if ($kat_existiert) {
                        return $this->renderText(json_encode('Im Kompetenzbaum existiert bereits eine Kategorie mit diesem Namen. Spezifizieren Sie die Bezeichnung genauer oder verwenden Sie die bereits vorhandene Kategorie.'));
                    }

                    $parent = Doctrine::getTable('KompetenzKategorien')
                            ->findOneByKompetenzKategorieId($kategorie);

                    $k = new KompetenzKategorien();
                    $k->setBezeichnung($name);
                    $k->save();
                    $k->getNode()->insertAsLastChildOf($parent);

                    $this->parent = $k;
                } else if ($kategorie) {
                    // Verwende die angegebene Kategorie als übergeordnete 
                    // Kategorie
                    $this->parent = Doctrine::getTable('KompetenzKategorien')
                            ->findOneByKompetenzKategorieId($kategorie);
                } else if ($name) {
                    // Neues Wurzelelement erstellen
                    // Existiert bereits eine solche Kategorie?
                    $kat_existiert = Doctrine::getTable('KompetenzKategorien')
                            ->findOneByBezeichnung($name);

                    if ($kat_existiert) {
                        return $this->renderText(json_encode('Im Kompetenzbaum existiert bereits eine Kategorie mit diesem Namen. Spezifizieren Sie die Bezeichnung genauer oder verwenden Sie die bereits vorhandene Kategorie.'));
                    }

                    $k = new KompetenzKategorien();
                    $k->setBezeichnung($name);
                    $k->save();

                    $treeObject = Doctrine_Core::getTable('KompetenzKategorien')->getTree();
                    $treeObject->createRoot($k);

                    $this->parent = $k;
                }

                $kompetenz_existiert = count(Doctrine::getTable('Kompetenzen')
                                ->findByBezeichnung($request->getParameter('title')));


                if ($kompetenz_existiert) {
                    return $this->renderText(json_encode("Im Kompetenzbaum existiert bereits eine Kompetenz mit diesem Namen. Spezifizieren Sie die Bezeichnung genauer oder verwenden Sie die bereits vorhandene Kompetenz."));
                }

                // Neue Kompetenz anlegen
                $kompetenz_form = new KompetenzenForm();
                // Daten zuweisen
                $kompetenz_form->bind(array(
                    'kompetenz_kategorie_id' => $this->parent->getKompetenzKategorieId(),
                    'bezeichnung' => $request->getParameter('title'),
                    'beschreibung' => $request->getParameter('comment'),
                    // Initial deaktiviert, da die Kompetenz händisch überprüft 
                    // werden soll
                    'aktiv' => 0,
                    // Workaround: disableLocalCSRFProtection funktioniert nicht
                    '_csrf_token' => $kompetenz_form->getCSRFToken()
                        )
                );
                // Hier keine CSRFProtection, da von Hand erstellt
                //$kompetenz_form->disableLocalCSRFProtection();
                // Daten korrekt?
                if ($kompetenz_form->isValid()) {
                    try {
                        $kompetenz = $kompetenz_form->save();
                        // Kompetenz ID für das zugehörige Niveau
                        $id = $kompetenz->getKompetenzId();
                        
                    } catch (Exception $e) {
                        return $this->renderText(json_encode("Die Kompetenz konnte nicht gespeichert werden."));
                    }
                } else {
                    if ($kompetenz_form->hasErrors()) {
                        $errors = array();
                        foreach ($kompetenz_form as $widget) {
                            $error = $widget->getError();
                            if ($error) {
                                // get only the string representation of the error
                                $errors[] = (string) $widget . (string) $error;
                            }
                        }
                    }
                    //sfFirePHP::getInstance(true)->fb($errors);
                    return $this->renderText(json_encode("Die eingegebenen
                        Kompetenzdaten sind nicht valide."));
                }
            } else {
                // Kompetenz ID für das zugehörige Niveau
                $id = $request->getParameter('id');
            }

            // Niveaueintrag anlegen
            // Profil ID des Nutzers
            $profil_id = $this->getUser()->getProfile()->getProfilId();

            // Existiert bereits ein Eintrag mit den angegebenen Niveaustufen?
            $niveau_existiert = count(Doctrine::getTable('Niveaus')
                            ->findByProfilIdAndKompetenzId(
                                    $profil_id, $id
                            ));
        
            if ($niveau_existiert) {
                // Niveaueintrag updaten
                $niveau = Doctrine::getTable('Niveaus')
                            ->findOneByProfilIdAndKompetenzId(
                                    $profil_id, $id
                            );
                
                $niveau->setNiveau($request->getParameter('niveau'));
               
                if ($niveau->isValid()) {
                    try {
                        $niveau->save();
                        return $this->renderText(json_encode(true));
                    } catch (Exception $e) {
                        return $this->renderText(json_encode("Die Daten bzgl.
                            des Niveaus konnten nicht gespeichert werden."));
                    }
                } else {
                    return $this->renderText(json_encode("Die eingegebenen 
                            Daten bzgl. des Niveaus sind nicht valide."));
                }

            } else {
                $this->form = new NiveausForm();
                // Daten zuweisen
                $this->form->bind(array(
                    'profil_id' => $profil_id,
                    'kompetenz_id' => $id,
                    'niveau' => $request->getParameter('niveau'),
                    '_csrf_token' => $request->getParameter('_csrf_token')
                        )
                );

                if ($this->form->isValid()) {

                    try {
                        $niveau = $this->form->save();
                        return $this->renderText(json_encode(true));
                    } catch (Exception $e) {
                        return $this->renderText(json_encode("Die Daten bzgl.
                            des Niveaus konnten nicht gespeichert werden."));
                    }
                } else {
                    if ($this->form->hasErrors()) {
                        $errors = array();
                        foreach ($this->form as $widget) {
                            $error = $widget->getError();
                            if ($error) {
                                // get only the string representation of the error
                                $errors[] = (string) $widget . (string) $error;
                            }
                        }
                    }
                    sfFirePHP::getInstance(true)->fb($errors);
                    return $this->renderText(json_encode("Die eingegebenen 
                            Daten bzgl. des Niveaus sind nicht valide."));
                }
            }
        } else {
            $this->forward404();
        }
    }

    /**
     * Gibt den Kompetenzbaum, bestehend aus Kategorien und Kompetenzen im JSON
     * Format zurück
     * @param sfWebRequest $request
     * @return json String 
     */
    public function executeGetData(sfWebRequest $request) {
        $q = Doctrine_Query::create()
                ->select('kk.bezeichnung, kk.beschreibung, kk.root_id, kk.lft, kk.rgt, kk.level, k.bezeichnung, k.beschreibung, n.profil_id, n.niveau')
                ->from('KompetenzKategorien kk')
                ->leftJoin('kk.Kompetenzen k')
                ->leftJoin('k.Niveaus n')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY_HIERARCHY);


        $treeObject = Doctrine_Core::getTable('KompetenzKategorien')->getTree();
        $treeObject->setBaseQuery($q);
        //$treeObject->resetBaseQuery();

        $rootColumnName = $treeObject->getAttribute('rootColumnName');

        $arr = array();

        foreach ($treeObject->fetchRoots() as $root) {
            $options = array(
                'root_id' => $root[$rootColumnName]
            );
            foreach ($treeObject->fetchTree($options) as $element) {
                //sfFirePHP::getInstance(true)->fb(memory_get_usage());
                //sfFirePHP::getInstance(true)->fb($element);
                AsLib::createSubTree($element, $this->getUser()->getProfile()->getProfilId(), $arr);
            }
        }
        
        return $this->renderText(json_encode($arr));
    }

    /**
     * Gibt das Auswahlfeld für Kategorien zurück
     * Format zurück
     * @param sfWebRequest $request
     */
    public function executeGetCategories(sfWebRequest $request) {
        $this->kategorien = new kompetenzenForm();
        $this->kategorien->getWidget('kompetenz_kategorie_id')
                ->setAttribute('id', 'kompetenz_details_kategorie');
        $this->kategorien->getWidget('kompetenz_kategorie_id')
                ->setAttribute('name', '');
        $this->kategorien->getWidget('kompetenz_kategorie_id')
                ->setAttribute('class', 'validate[groupRequired[kategorie]]');
    }

    public function executeIndex(sfWebRequest $request) {
        $this->niveaus = Doctrine_Core::getTable('niveaus')
                ->createQuery('a')
                ->where('profil_id = ?', $this->getUser()->getProfilId())
                ->orderBy('niveau DESC')
                ->execute();

        $this->niveaustufen = sfYaml::load(sfConfig::get('sf_config_dir') . '/app_data.yml');
        $this->niveaustufen = $this->niveaustufen['Niveaustufen'];
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($niveaus = Doctrine_Core::getTable('niveaus')->find(array($request->getParameter('niveau_id'))), sprintf('Object niveaus does not exist (%s).', $request->getParameter('niveau_id')));
        $this->form = new niveausForm($niveaus);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($niveaus = Doctrine_Core::getTable('niveaus')->find(array($request->getParameter('niveau_id'))), sprintf('Object niveaus does not exist (%s).', $request->getParameter('niveau_id')));
        $this->form = new niveausForm($niveaus);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($niveaus = Doctrine_Core::getTable('niveaus')->find(array($request->getParameter('niveau_id'))), sprintf('Object niveaus does not exist (%s).', $request->getParameter('niveau_id')));
        $niveaus->delete();

        $this->redirect('niveaus/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $niveaus = $form->save();

            $this->redirect('niveaus/edit?niveau_id=' . $niveaus->getNiveauId());
        }
    }

}
