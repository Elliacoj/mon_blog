<?php

namespace Model\Manager;


use Model\Entity\Article;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;

class ArticleManager {
    use ManagerTrait;

    /**
     * Return all article
     */
    public function getAll(): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM article");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $articles[] = new Article($article_data['content'], $article_data['id'], $article_data['title'], $article_data['subTitle'], $article_data['resume'], $article_data['date']);
            }
        }
        return $articles;
    }

    /**
     * Return an Article or null
     * @param $id
     * @return Article
     */
    public function get($id): ?Article {
        $request = DB::getInstance()->prepare("SELECT * FROM article WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        $article = null;

        if($result && $data = $request->fetch()) {
            $article = new Article($data['content'], $data['id'], $data['title'], $data['subTitle'], $data['resume'], $data['date']);
        }

        return $article;
    }

    /**
     * Add an article into the database
     * @param Article $article
     * @return bool
     */
    public function add(Article $article): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO article (content, title, subTitle, resume)
                VALUES (:content, :title, :subTitle, :resume) 
        ");
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':subTitle', $article->getSubTitle());
        $request->bindValue(':resume', $article->getResume());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update an article into the database
     * @param Article $article
     * @return bool
     */
    public function update(Article $article): bool {
        $request = DB::getInstance()->prepare("UPDATE article SET content = :content, title = :title, subTitle = :subTitle, resume = :resume WHERE id = :id");
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':subTitle', $article->getSubTitle());
        $request->bindValue(':resume', $article->getResume());
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }

    /**
     * Delete an article into the database
     * @param Article $article
     * @return bool
     */
    public function delete(Article $article): bool {
        $request = DB::getInstance()->prepare("DELETE FROM article WHERE id = :id");
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }
}

