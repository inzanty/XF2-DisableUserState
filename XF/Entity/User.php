<?php

namespace MMO\DisableUserState\XF\Entity;

class User extends XFCP_User
{
    public function canDisableAccount()
    {
        return $this->hasPermission('general', 'canDisableAccount');
    }
}