<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;


class UserController {

    use RenderViewTrait;

    public function login() {
        $this->render('login', 'Connexion');
    }

    public function create() {
        $this->render('newUser', 'Création de compte');
    }
}