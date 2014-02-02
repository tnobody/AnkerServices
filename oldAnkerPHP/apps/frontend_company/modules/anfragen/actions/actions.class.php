<?php

/**
 * anfragen actions.
 *
 * @package    ankerservices
 * @subpackage anfragen
 * @author     Andreas Hanauska
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class anfragenActions extends sfActions {

    public function executeCreate(sfWebRequest $request) {

        // only execute if is an ajax request  
        if ($request->isXmlHttpRequest()) {

            $this->getResponse()->setContentType('application/json');

            $profil_id = $request->getParameter('id');

            // Existiert bereits eine Anfrage nach diesem Profil?
            $anfrage_existiert = count(Doctrine::getTable('Anfragen')
                            ->findByProfilIdAndSfGuardUserId(
                                    $profil_id, $this->getUser()->getId()
                            ));

            if ($anfrage_existiert) {
                return $this->renderText(json_encode(false));
            } else {
                $anfrage = new Anfragen();
                
                $anfrage->setProfilId($profil_id);
                $anfrage->setSfGuardUserId($this->getUser()->getId());
                $anfrage->setKommentar($request->getParameter('comment'));

                try {
                    // Schlägt das Versenden fehl, bekommt der Nutzer die Rückmeldung,
                    // dass der Versand nicht geklappt hat.
                    // Wenn die Anfrage aber vor dem Mailversand in der DB
                    // gespeichert wird, kann er trotz dieser negativen Rückmeldung
                    // beim nächsten Seitenaufruf keine Anfrage mehr senden,
                    // da bereits eine Anfrage in der DB besteht.
                    // Dies könnte zur Verwirrung des Nutzers führen und wird
                    // durch folgende Reihenfolge unterbunden

                    // Zuerst die Mail versenden
                    $message = Swift_Message::newInstance()
                        ->setFrom('info@mahadi-tech.de')
                        ->setTo('info@mahadi-tech.de')
                        ->setSubject('AnkerServices: Eine neue Profilanfrage liegt vor')
                        ->setBody($request->getParameter('comment'));

                    $this->getMailer()->send($message);
                    
                    // Dann die Anfrage speichern
                    $anfrage->save();

                    return $this->renderText(json_encode(true));
                } catch (Exception $e) {
                    return $this->renderText(json_encode($e->getMessage()));
                }
            }
        } else {
            $this->forward404();
        }
    }

//  public function executeDelete(sfWebRequest $request)
//  {
//    $request->checkCSRFProtection();
//
//    $this->forward404Unless($anfragen = Doctrine_Core::getTable('Anfragen')->find(array($request->getParameter('anfrage_id'))), sprintf('Object anfragen does not exist (%s).', $request->getParameter('anfrage_id')));
//    $anfragen->delete();
//
//    $this->redirect('anfragen/index');
//  }
}
