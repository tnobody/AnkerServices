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
                // Eine Firma wird auf ihr Frontend weiter geleitet,
                // solange der Nutzer nicht der Superadmin ist
                // Superadmin übergeht alle Sicherheitsabfragen und würde
                // hier zur unendlichen Rekursion führen
                if ($user->hasCredential('firmen')
                        && !$user->getGuardUser()->getIsSuperAdmin()) {
                    $env = $context->getConfiguration()->getEnvironment();
                    $sfx = ($env == 'prod') ? "" : "_" . $env;
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
