<?php

/**
 * lebenslauf actions.
 *
 * @package    ankerservices
 * @subpackage lebenslauf
 * @author     Stefan Hanauska 
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class lebenslaufActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->lebenslaufs = $this->getUser()->getProfile()->getLebenslauf();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->lebenslauf = Doctrine::getTable('Lebenslauf')->find(array($request->getParameter('ll_id')));
    $this->forward404Unless($this->lebenslauf);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LebenslaufForm();
    $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LebenslaufForm();
    $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($lebenslauf = Doctrine::getTable('Lebenslauf')->find(array($request->getParameter('ll_id'))), sprintf('Der gewählte Eintrag existiert nicht (%s).', $request->getParameter('ll_id')));
    $this->form = new LebenslaufForm($lebenslauf);
    $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($lebenslauf = Doctrine::getTable('Lebenslauf')->find(array($request->getParameter('ll_id'))), sprintf('Der gewählte Eintrag existiert nicht (%s).', $request->getParameter('ll_id')));
    $this->form = new LebenslaufForm($lebenslauf);
    $this->form->getObject()->setProfilId($this->getUser()->getProfile()->getProfilId());
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($lebenslauf = Doctrine::getTable('Lebenslauf')->find(array($request->getParameter('ll_id'))), sprintf('Der gewählte Eintrag existiert nicht (%s).', $request->getParameter('ll_id')));
    $lebenslauf->delete();

    $this->redirect('lebenslauf/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $lebenslauf = $form->save();

      $this->redirect('lebenslauf/edit?ll_id='.$lebenslauf->getLlId());
    }
  }
}
