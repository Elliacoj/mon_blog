<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Article;
use Model\Manager\ArticleManager;
use Model\User\UserManager;

class ArticleController {

    use RenderViewTrait;

    /**
     * Affiche la liste des articles disponibles.
     */
    public function articles() {
        $manager = new ArticleManager();
        $articles = $manager->getAll();

        $this->render('articles', 'Mes articles', [
            'articles' => $articles,
        ]);
    }

    /**
     * Poster create article page and add an article into table article
     */
    public function addArticle(){
        if(isset($_POST['content'], $_POST['subTitle'], $_POST['title'], $_POST['resume'])) {

            $articleManager = new ArticleManager();

            $content = htmlentities($_POST['content']);
            $title = htmlentities($_POST['title']);
            $subTitle = htmlentities($_POST['subTitle']);
            $resume = htmlentities($_POST['resume']);

            $article = new Article();
            $article->setContent($content)->setTitle($title)->setSubTitle($subTitle)->setResume($resume);
            $articleManager->add($article);

            $controller = new HomeController();
            $controller->homePage(6);
        }

        $this->render('add.article', 'Ajouter un article');
    }
}