<?php

namespace MMO\DisableUserState\Pub\Controller;

use XF\Pub\Controller\AbstractController;
use XF\Mvc\ParameterBag;

class DisableAccount extends AbstractController
{
    /**
     * @param $action
     * @param ParameterBag $params
     * @throws \XF\Mvc\Reply\Exception
     */
    protected function preDispatchController($action, ParameterBag $params)
    {
        /** @var \MMO\DisableUserState\XF\Entity\User  $visitor */
        $visitor = \XF::visitor();
        if (!$visitor->canDisableAccount())
        {
            throw $this->exception($this->noPermission());
        }
    }

    public function actionIndex()
    {
        return $this->view('MMO\DisableUserState:DisableAccount', 'mmo_dus_view');
    }

    public function actionConfirm()
    {
        $disableAccount = \XF::visitor()->fastUpdate('user_state', 'disabled');

        return $this->message(\XF::phrase('mmo_dus_disable'));
    }
}