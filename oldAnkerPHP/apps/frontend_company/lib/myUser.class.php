<?php

class myUser extends sfGuardSecurityUser
{
    /**
     * Gibt die Id des aktuellen Users zurück
     * Proxymethode für $this->getUser()->getGuardUser()->getId()
     * @return int
     */
    public function getId() {
        return $this->getGuardUser()->getId();
    }
}
