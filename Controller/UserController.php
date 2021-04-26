<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Role;
use Model\Entity\User;
use Model\User\UserManager;


class UserController {

    use RenderViewTrait;

    public function login() {
        $this->render('login', 'Connexion');
    }

    /**
     * Poster create page and add a user in table User if conditions is clear
     */
    public function create() {
        if(isset($_POST['username'], $_POST['password'], $_POST['mail'])) {
            $username = DB::sanitizeString($_POST['username']);
            $password = DB::sanitizeString($_POST['password']);
            $mail = DB::sanitizeString($_POST['mail']);

            if(!DB::checkPassword($password)) {
                $this->render('newUser', 'Création de compte',null, "?controller=user&action=create&error=1" );
            }
            elseif(UserManager::getManager()->log($mail) != null) {
                $this->render('newUser', 'Création de compte',null, "?controller=user&action=create&error=3" );
            }
            else {
                $user = new User(null, $username, $password, $mail, new Role(2, "Utilisateur"));
                $add = UserManager::getManager()->add($user);

                if($add) {
                    $this->render('home', 'Home',null, "?error=0" );
                }
                else {
                    $this->render('newUser', 'Création de compte',null, "?controller=user&action=create&error=2" );
                }
            }
        }

        $this->render('newUser', 'Création de compte');
    }
}