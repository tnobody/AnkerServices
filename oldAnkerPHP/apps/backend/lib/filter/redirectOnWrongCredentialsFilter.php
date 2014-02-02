<?php

class redirectOnWrongCredentialsFilter extends sfFilter {

    public function execute($filterChain) {
                
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // Filters don't have direct access to the request and user objects.
            // You will need to use the context object to get them
            $context = $this->getContext();
            $user = $context->getUser();            

            if ($user && $user->isAuthenticated() && !$user->hasCredential('admin')) {  
                $env = $context->getConfiguration()->getEnvironment(); 
                $sfx = ($env=='prod') ? "" : "_".$env; 
                // Ein Student wird auf sein Frontend weiter geleitet
                if($user->hasCredential('student')) {   
                    $url = $context->getController()->genUrl("/frontend_employee" . $sfx . ".php");
                    return $context->getController()->redirect($url);
                }
                
                // Eine Firma wird auf ihr Frontend weiter geleitet
                if($user->hasCredential('firmen')) {       
                    $url = $context->getController()->genUrl("/frontend_company" . $sfx . ".php");
                    return $context->getController()->redirect($url);
                }
            }
        }
        
        // Execute next filter
        $filterChain->execute();
    }

}

?>
