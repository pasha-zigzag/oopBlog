<?php

namespace Controllers;

use Models\Users\User;
use Services\UsersAuthService;
use Views\View;

abstract class AbstractController
{
    protected $view;
    protected $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../Views/templates');
        $this->view->setVar('user', $this->user);
    }
}