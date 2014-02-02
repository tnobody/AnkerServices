<?php

class ajaxSessionTimeoutFilter extends sfFilter {

    public function execute($filterChain) {
                
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // Filters don't have direct access to the request and user objects.
            // You will need to use the context object to get them       
            $user = $this->getContext()->getUser();

            if ($user->isAuthenticated()) {
                // Den User warnen, wenn seine Session droht abzulaufen
                $this->getContext()->getResponse()->addJavascript('jquery.idletimer.js', 'last');
                $this->getContext()->getResponse()->addJavascript('jquery.idletimeout.js', 'last');
                $this->getContext()->getResponse()->addJavascript('session_timeout.js', 'last');
            }     
        }
        
        // Execute next filter
        $filterChain->execute();
    }

}

?>
