<?php


namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Commentary;
use Model\Manager\ArticleManager;
use Model\Manager\CommentaryManager;
use Model\User\UserManager;

class CommentaryController
{
    use RenderViewTrait;

    /**
     * Poster article page and add commentary into table commentary
     */
    public function add() {
        if(isset($_POST['comment'])) {
            $comment = htmlentities($_POST['comment']);
            $commentary = new Commentary();
            $article = ArticleManager::getManager()->get($_GET['article']);
            $user = UserManager::getManager()->getById($_SESSION['id']);

            $commentary->setContent($comment)->setArticleFk($article)->setUserFk($user);

            if(CommentaryManager::getManager()->add($commentary)) {
                $comment = CommentaryManager::getManager()->getAll($article->getId());
                $this->render('article', 'Article', [
                    "article" => $article,
                    "comment" => $comment
                ]);
            }
        }
    }

    public function delete() {
        if(isset($_GET['comment'])) {
            $comment = CommentaryManager::getManager()->get($_GET['comment']);
            if(CommentaryManager::getManager()->delete($comment)) {
                $article = ArticleManager::getManager()->get($_GET['article']);
                $comment = CommentaryManager::getManager()->getAll($article->getId());
                $this->render('article', 'Article', [
                    "article" => $article,
                    "comment" => $comment
                ]);
            }
        }
    }
}