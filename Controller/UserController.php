<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Role;
use Model\Entity\User;
use Model\User\UserManager;


class UserController {

    use RenderViewTrait;

    /**
     * Poster login page and create sessions (id, username and role) if the information is correct
     */
    public function login() {
        if(isset($_POST['mail'], $_POST['password'])) {
            $user_data = UserManager::getManager()->log($_POST['mail']);
            if($user_data != null) {
                if(password_verify($_POST['password'], $user_data->getPassword())) {
                    $_SESSION['id'] = $user_data->getId();
                    $_SESSION['username'] = $user_data->getUsername();
                    $_SESSION['role'] = $user_data->getRole()->getName();

                    $controller = new HomeController();
                    $controller->homePage();
                }
                else {
                    $this->render('login', 'Connexion', [
                        'error' => "5",
                    ]);
                }
            }
            else {
                $this->render('login', 'Connexion', [
                    'error' => "4",
                ]);
            }
        }
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
                $this->render('newUser', 'Création de compte', [
                    'error' => "1",
                ]);
            }
            elseif(UserManager::getManager()->log($mail) != null) {
                $this->render('newUser', 'Création de compte', [
                    'error' => "2",
                ]);
            }
            else {
                $user = new User($username, $password,null , $mail, new Role(2, "Utilisateur"));
                $add = UserManager::getManager()->add($user);

                if($add) {
                    $controller = new HomeController();
                    $controller->homePage("0");
                }
                else {
                    $this->render('newUser', 'Création de compte', [
                        'error' => "3",
                    ]);
                }
            }
        }

        $this->render('newUser', 'Création de compte');
    }

    public function logout() {
        if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['role'])) {
            $_SESSION = array();
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            session_destroy();

            $controller = new HomeController();
            $controller->homePage();
        }
    }
}