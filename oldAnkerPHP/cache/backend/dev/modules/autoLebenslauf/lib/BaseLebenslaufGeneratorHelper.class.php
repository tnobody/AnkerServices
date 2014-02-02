<?php

/**
 * lebenslauf module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage lebenslauf
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLebenslaufGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'lebenslauf' : 'lebenslauf_'.$action;
  }
}
