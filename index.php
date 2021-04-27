<?php
session_start();

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Article.php';
require_once './Model/Entity/Role.php';
require_once './Model/Entity/Commentary.php';

require_once './Model/Manager/ArticleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/CommentaryManager.php';
require_once './Model/Manager/RoleManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ArticleController.php';
require_once './Controller/UserController.php';

use Controller\HomeController;
use Controller\ArticleController;
use Controller\UserController;


if(isset($_GET['controller'])) {
    switch($_GET['controller']) {
        case 'articles':
            $controller = new ArticleController();

            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle();
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->articles();
            }

            break;
        case 'user':
            $controller = new UserController();

            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'login':
                        $controller->login();
                        break;
                    case 'create':
                        $controller->create();
                        break;
                    case 'logout':
                        $controller->logout();
                        break;
                }
            }
            break;
        default:

            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}
