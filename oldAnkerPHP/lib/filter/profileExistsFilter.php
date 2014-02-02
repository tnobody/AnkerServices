<?php

class profileExistsFilter extends sfFilter {

    public function execute($filterChain) {
                
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // Filters don't have direct access to the request and user objects.
            // You will need to use the context object to get them
            $user = $this->getContext()->getUser();

            if (!$user->getProfile()->getProfilId()) {
                return $this->getContext()->getController()->forward('profil', 'new');
            }
        }
        
        // Execute next filter
        $filterChain->execute();
    }

}

?>
