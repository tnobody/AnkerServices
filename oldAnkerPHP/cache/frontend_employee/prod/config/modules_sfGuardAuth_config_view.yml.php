<?php
// auto-generated by sfViewConfigHandler
// date: 2013/09/21 15:41:23
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Ankerservices - Oberfläche für Angestellte', false, false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('frontend_employee/frontend_employee.css', '', array ());
  $response->addStylesheet('smoothness/jquery-ui-1.8.4.custom.css', '', array ());
  $response->addStylesheet('idletimeout.css', '', array ());
  $response->addJavascript('jquery-1.6.4.min.js', '', array ());
  $response->addJavascript('jquery-ui-1.8.4.custom.min.js', '', array ());

