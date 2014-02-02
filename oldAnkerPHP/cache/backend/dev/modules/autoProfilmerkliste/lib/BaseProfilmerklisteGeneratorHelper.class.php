<?php

/**
 * profilmerkliste module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage profilmerkliste
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfilmerklisteGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'profil_merkliste' : 'profil_merkliste_'.$action;
  }
}
