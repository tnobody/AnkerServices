<?php

class redirectOnWrongCredentialsFilter extends sfFilter {

    public function execute($filterChain) {

        // Execute this filter only once
        if ($this->isFirstCall()) {
            // Filters don't have direct access to the request and user objects.
            // You will need to use the context object to get them
            $context = $this->getContext();
            $user = $context->getUser();

            if ($user && $user->isAuthenticated()) {
                // Ein Student wird auf sein Frontend weiter geleitet,
                // solange er nicht der Superadmin ist
                // Superadmin übergeht alle Sicherheitsabfragen und würde
                // hier zur unendlichen Rekursion führen
                if ($user->hasCredential('student')
                        && !$user->getGuardUser()->getIsSuperAdmin()) {
                    $env = $context->getConfiguration()->getEnvironment();
                    $sfx = ($env == 'prod') ? "" : "_" . $env;
                    $url = $context->getController()->genUrl("/frontend_employee" . $sfx . ".php");
                    return $context->getController()->redirect($url);
                }
            }
        }

        // Execute next filter
        $filterChain->execute();
    }

}

?>
