<?php

/**
 * kompetenz_kategorien actions.
 *
 * @package    ankerservices
 * @subpackage kompetenz_kategorien
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kompetenz_kategorienActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->kompetenz_kategoriens = Doctrine::getTable('KompetenzKategorien')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->kompetenz_kategorien = Doctrine::getTable('KompetenzKategorien')->find(array($request->getParameter('kompetenz_kategorie_id')));
    $this->forward404Unless($this->kompetenz_kategorien);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new KompetenzKategorienForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new KompetenzKategorienForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($kompetenz_kategorien = Doctrine::getTable('KompetenzKategorien')->find(array($request->getParameter('kompetenz_kategorie_id'))), sprintf('Object kompetenz_kategorien does not exist (%s).', $request->getParameter('kompetenz_kategorie_id')));
    $this->form = new KompetenzKategorienForm($kompetenz_kategorien);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($kompetenz_kategorien = Doctrine::getTable('KompetenzKategorien')->find(array($request->getParameter('kompetenz_kategorie_id'))), sprintf('Object kompetenz_kategorien does not exist (%s).', $request->getParameter('kompetenz_kategorie_id')));
    $this->form = new KompetenzKategorienForm($kompetenz_kategorien);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($kompetenz_kategorien = Doctrine::getTable('KompetenzKategorien')->find(array($request->getParameter('kompetenz_kategorie_id'))), sprintf('Object kompetenz_kategorien does not exist (%s).', $request->getParameter('kompetenz_kategorie_id')));
    $kompetenz_kategorien->delete();

    $this->redirect('kompetenz_kategorien/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $kompetenz_kategorien = $form->save();

      $this->redirect('kompetenz_kategorien/edit?kompetenz_kategorie_id='.$kompetenz_kategorien->getKompetenzKategorieId());
    }
  }
}
