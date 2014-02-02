<?php

/**
 * profil actions.
 *
 * @package    ankerservices
 * @subpackage profil
 * @author     Andreas Hanauska
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profilActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->profil = $this->getUser()->getProfile();
    }

    public function executeShow(sfWebRequest $request) {
        $this->profile = Doctrine::getTable('Profile')->find(array($request->getParameter('profil_id')));
        $this->forward404Unless($this->profile);
    }

    public function executeNew(sfWebRequest $request) {
        if ($this->getUser()->getProfile()->exists()) {
            $this->getUser()->setFlash('notice', 'Sie besitzen bereits ein Profil');
            $this->redirect('profil/index');
        } else {
            $this->form = new ProfileForm();
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        if ($this->getUser()->getProfile()->exists()) {
            $this->getUser()->setFlash('notice', 'Sie besitzen bereits ein Profil');
            $this->redirect('profil/index');
        } else {
            $this->form = new ProfileForm();
            $this->form->getObject()->setSfGuardUserId($this->getUser()->getId());

            $this->processForm($request, $this->form);

            $this->setTemplate('new');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($profile = Doctrine::getTable('Profile')->find(array($request->getParameter('profil_id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('profil_id')));
        $this->form = new ProfileForm($profile);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($profile = Doctrine::getTable('Profile')->find(array($request->getParameter('profil_id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('profil_id')));
        $this->form = new ProfileForm($profile);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($profile = Doctrine::getTable('Profile')->find(array($request->getParameter('profil_id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('profil_id')));
        $profile->delete();

        $this->redirect('profil/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $profil = $form->save();

            $this->redirect('profil/show?profil_id=' . $profil->getProfilId());
            //$this->redirect('profil/index');
        }
    }

}
