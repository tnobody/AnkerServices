<?php

/**
 * verfuegbarkeit actions.
 *
 * @package    ankerservices
 * @subpackage verfuegbarkeit
 * @author     Stefan Hanauska
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class verfuegbarkeitActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
		$this->verfuegbarkeits = $this->getUser()->getProfile()->getVerfuegbarkeit();
		$this->form = new VerfuegbarkeitForm();
		$this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
	}

	public function executeShow(sfWebRequest $request) {
		$this->verfuegbarkeit = Doctrine::getTable('Verfuegbarkeit')->find(array($request->getParameter('datum'), $request->getParameter('profil_id')));
		$this->forward404Unless($this->verfuegbarkeit);
	}

	public function executeNew(sfWebRequest $request) {
		$this->form = new VerfuegbarkeitForm();
	}

	public function executeCreate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new VerfuegbarkeitForm();
		$this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
		$this->processForm($request, $this->form);

		if(!$request->isXmlHttpRequest()) {
    			$this->setTemplate('new');
		} else { 
			$this->setTemplate('createAJAX');
		}
	}

	public function executeEdit(sfWebRequest $request) {
		$this->forward404Unless($verfuegbarkeit = Doctrine::getTable('Verfuegbarkeit')->find(array($request->getParameter('datum'), $request->getParameter('profil_id'))), sprintf('Object verfuegbarkeit does not exist (%s).', $request->getParameter('datum'), $request->getParameter('profil_id')));
		$this->form = new VerfuegbarkeitForm($verfuegbarkeit);
	}

	public function executeUpdate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($verfuegbarkeit = Doctrine::getTable('Verfuegbarkeit')->find(array($request->getParameter('datum'), $request->getParameter('profil_id'))), sprintf('Object verfuegbarkeit does not exist (%s).', $request->getParameter('datum'), $request->getParameter('profil_id')));
		$this->form = new VerfuegbarkeitForm($verfuegbarkeit);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request) {
		//    $request->checkCSRFProtection();

		$this->forward404Unless($verfuegbarkeit = Doctrine::getTable('Verfuegbarkeit')->find(array($request->getParameter('datum'), $this->getUser()->getProfile()->getProfilId())), sprintf('Object verfuegbarkeit does not exist (%s).', $request->getParameter('datum'), $this->getUser()->getProfile()->getProfilId()));
		$verfuegbarkeit->delete();

		if(!$request->isXmlHttpRequest()) {
			$this->redirect('verfuegbarkeit/index');
		}
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$verfuegbarkeit = $form->save();

			if(!$request->isXmlHttpRequest()) {
				$this->redirect('verfuegbarkeit/edit?datum='.$verfuegbarkeit->getDatum().'&profil_id='.$verfuegbarkeit->getProfilId());
			}
    		}
	}
}
