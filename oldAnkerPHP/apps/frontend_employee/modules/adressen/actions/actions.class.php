<?php

/**
 * adressen actions.
 *
 * @package    ankerservices
 * @subpackage adressen
 * @author     Stefan Hanauska 
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adressenActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->adressens = $this->getUser()->getProfile()->getAdressen();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->adressen = Doctrine::getTable('Adressen')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->adressen);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdressenForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdressenForm();
    $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($adressen = Doctrine::getTable('Adressen')->find(array($request->getParameter('id'))), sprintf('Die gewählte Adresse existiert nicht (%s).', $request->getParameter('id')));
    $this->form = new AdressenForm($adressen);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($adressen = Doctrine::getTable('Adressen')->find(array($request->getParameter('id'))), sprintf('Die gewählte Adresse existiert nicht (%s).', $request->getParameter('id')));
    $this->form = new AdressenForm($adressen);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($adressen = Doctrine::getTable('Adressen')->find(array($request->getParameter('id'))), sprintf('Die gewählte Adresse existiert nicht (%s).', $request->getParameter('id')));
    $adressen->delete();
    $this->getUser()->setFlash('notice', sprintf('Ihre Adresse "%s" wurde gelöscht!', $adressen->getAlias()));
    $this->redirect('adressen/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $adressen = $form->save();
      $this->getUser()->setFlash('notice', sprintf('Ihre Adresse "%s" wurde gespeichert!', $adressen->getAlias()));
      $this->redirect('adressen/show?id='.$adressen->getId());
    }
  }
}
