<?php

/**
 * dokumente actions.
 *
 * @package    ankerservices
 * @subpackage dokumente
 * @author     Andreas Hanauska
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dokumenteActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->dokumentes = Doctrine::getTable('Dokumente')
                ->createQuery('a')
                ->select('pfad')
                ->addSelect('titel')
                ->where('profil_id = ?', $this->getUser()->getProfilId())
                ->execute();

        $info = AsLib::get_file_objects($this->dokumentes->toArray());

        $this->getResponse()->setContentType('application/json');
        return $this->renderText(json_encode($info));
    }

    public function executeNew(sfWebRequest $request) {
        if ($this->getUser()->getProfile()->getProfilId()) {
            $this->form = new DokumenteForm();
        } else {
            $this->getUser()->setFlash('notice', 'Sie besitzen noch kein Profil. Legen Sie zuerst ein Profil an bevor sie Dokumente hochladen.');
            $this->redirect('profil/index');
        }
    }

    public function executeCreate(sfWebRequest $request) {

        $params = $request->getParameterHolder()->getAll();

        $file = new stdClass();

        // todo check ob maximale Dateigröße (htmlseitig) überschritten wurde

        if (!array_key_exists('title', $params)) {
            $file->error = 'Kein Titel vorhanden';
            return $this->renderText(json_encode(array($file)));
        }

        $params = array(
            'titel' => $params['title'][0]
        );

        // Ohne Form -> $request->getFiles()['files'][0]
        $files = $request->getFiles();

        if (!array_key_exists('files', $files)) {
            $file->error = 'Keine Datei vorhanden';
            return $this->renderText(json_encode(array($file)));
        }

        $files = array(
            'pfad' => $files['files'][0]
        );

        $this->form = new DokumenteForm();
        $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId()); //

        $dokument = $this->myProcessForm($params, $files, $this->form);

        if ($dokument) {
            // Hole aktuellen CSRF-Token
            // Hier muss baseForm verwendet werden, da diese in den Token mit einfließt
            $form = new BaseForm();
            $file->token = $form->getCSRFToken();

            $file->id = $dokument->getId();
            $file->name = $dokument->getTitel();
            $file->size = filesize(sfConfig::get('dokumente_upload_dir') . $dokument->getPfad());
            // todo typ ermitteln
            $file->type = 'irgendwas';
            $file->url = sfConfig::get('dokumente_upload_url') . $dokument->getPfad();

            foreach (sfConfig::get('app_dokumente_image_versions') as $version => $options) {
                $split = explode('.', $dokument->getPfad());
                if ($split[count($split) - 1] == 'pdf') {
                    $file->{$version . '_url'} = sfConfig::get('dokumente_upload_url').$options['upload_url']
                            . 'pdf.png';
                } else if (AsLib::create_scaled_image($dokument->getPfad(), $options)) {
                    $file->{$version . '_url'} = sfConfig::get('dokumente_upload_url').$options['upload_url']
                            . rawurlencode($dokument->getPfad());
                }
            }

            $file->delete_url = 'dokumente/delete'; // /' . $dokument->getId();
            $file->delete_type = 'DELETE';
        } else {
            // Wenn Fehleraufgetreten sind, die String-Repräsentationen davon
            // weitergeben
            if ($this->form->hasErrors()) {
                $errors = array();
                foreach ($this->form as $widget) {
                    $error = $widget->getError();
                    if ($error) {
                        // get only the string representation of the error
                        $errors[] = (string) $error;
                    }
                }
            }
            $file->error = $errors;
        }

        return $this->renderText(json_encode(array($file)));
    }

    protected function myProcessForm($params, $files, sfForm $form) {
        $form->bind($params, $files);
        if ($form->isValid()) {
            $dokumente = $form->save();
            return $dokumente;
        } else {
            return false;
        }
    }

    public function executeDelete(sfWebRequest $request) {

        if ($request->isXmlHttpRequest()) {

            $request->checkCSRFProtection();

            $dokument = Doctrine::getTable('Dokumente')->find(array($request->getParameter('id')));

            if (!$dokument) {
                return $this->renderText(json_encode(false));
            } else if ($this->getUser()->getProfilId() === $dokument->getProfilId()) {
                $dokument->delete();

                if (!unlink(sfConfig::get('sf_upload_dir') . '/dokumente/' . $dokument->getPfad())) {
                    if (file_exists(sfConfig::get('sf_upload_dir') . '/dokumente/' . $dokument->getPfad())) {
                        throw new sfException('Das Dokument konnte nicht gelöscht werden.');
                    } else {
                        throw new sfException('Das Dokument existiert nicht.');
                    }
                    return $this->renderText(json_encode(false));
                } else {
                    if (file_exists(sfConfig::get('sf_upload_dir') . '/dokumente/thumbnails/' . $dokument->getPfad())) {
                        // Thumbnail auch löschen
                        unlink(sfConfig::get('sf_upload_dir') . '/dokumente/thumbnails/' . $dokument->getPfad());
                    }
                    return $this->renderText(json_encode(true));
                }
            }
        } else {
            return $this->renderText(json_encode(false));
        }
    }

    /**
     * Liefert den Titel eines Dokuments zurück
     * @param sfWebRequest $request 
     */
    public function executeGetTitle(sfWebRequest $request) {
        if ($request->isXmlHttpRequest()) {
            $dokument = Doctrine::getTable('Dokumente')->find(array($request->getParameter('id')));

            if ($dokument && $this->getUser()->getProfilId() === $dokument->getProfilId()) {
                return $this->renderText(json_encode($dokument->getTitel()));
            } else {
                return $this->renderText(json_encode(false));
            }
        } else {
            return $this->renderText(json_encode(false));
        }
    }

    /**
     * Aktualisiert den Titel eines Dokuments
     * @param sfWebRequest $request 
     */
    public function executeUpdateTitle(sfWebRequest $request) {
        if ($request->isXmlHttpRequest()) {

            $request->checkCSRFProtection();

            $dokument = Doctrine::getTable('Dokumente')->find(array($request->getParameter('id')));

            if ($dokument && $this->getUser()->getProfilId() === $dokument->getProfilId()) {

                $dokument->setTitel($request->getParameter('title'));

                if ($dokument->isValid()) {
                    $dokument->save();
                    return $this->renderText($dokument->getTitel());
                } else {
                    return $this->renderText(false);
                }
            } else {
                return $this->renderText(false);
            }
        } else {
            return $this->renderText(json_encode(false));
        }
    }

}
