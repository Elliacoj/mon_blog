<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\Commentary;
use Model\Manager\Traits\ManagerTrait;
use Model\User\UserManager;

class CommentaryManager
{
    use ManagerTrait;

    /**
     * Get all commentary of an article
     * @param $article_fk
     * @return array
     */
    public function getAll($article_fk): array {
        $commentaries = [];

        $request = DB::getInstance()->prepare("SELECT * FROM commentary WHERE article_fk = :article_fk");
        $request->bindValue(':article_fk', $article_fk);
        $result = $request->execute();

        if($result && $data = $request->fetchAll()) {
            foreach ($data as $commentary) {
                $user = UserManager::getManager()->getById($commentary['user_fk']);
                $article = ArticleManager::getManager()->get($commentary['article_fk']);
                $commentaries [] = new Commentary($commentary['id'], $commentary['content'], $user, $article, $commentary['date'], $commentary['edit']);
            }
        }
        return $commentaries;
    }

    /** Add a commentary into the table commentary
     * @param Commentary $commentary
     * @return bool
     */
    public function add(Commentary $commentary): bool {
        $request = DB::getInstance()->prepare("INSERT INTO commentary (content, user_fk, article_fk) VALUES (:content, :user_fk, :article_fk)");
        $request->bindValue(":content", $commentary->getContent());
        $request->bindValue(":user_fk", $commentary->getUserFk()->getId());
        $request->bindValue("article_fk", $commentary->getArticleFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update a commentary into the table commentary
     * @param Commentary $commentary
     * @return bool
     */
    public function update(Commentary $commentary) : bool {
        $request = DB::getInstance()->prepare("UPDATE commentary SET content = :content WHERE id = :id");
        $request->bindValue(":content", $commentary->getContent());
        $request->bindValue(":id", $commentary->getId());

        return $request->execute();
    }

    /**
     * Delete a commentary into the table commentary
     * @param Commentary $commentary
     * @return bool
     */
    public function delete(Commentary $commentary): bool {
        $request = DB::getInstance()->prepare("DELETE FROM commentary WHERE id = :id");
        $request->bindValue(":id", $commentary->getId());

        return $request->execute();
    }
}