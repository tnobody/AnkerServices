<?php

/**
 * Niveaus form.
 *
 * @package    ankerservices
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NiveausForm extends BaseNiveausForm {

    public function configure() {
        unset(
                $this['angelegt'], $this['letzte_aenderung']
        );
    }

}
