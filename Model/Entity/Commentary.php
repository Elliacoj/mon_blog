<?php


namespace Model\Entity;

class Commentary {

    private ?int $id;
    private ?string $content;
    private ?User $user_fk;
    private ?Article $article_fk;
    private ?string $date;
    private ?int $edit;


    /**
     * Commentary constructor.
     * @param int|null $id
     * @param string|null $content
     * @param User|null $user_fk
     * @param Article|null $article_fk
     * @param string|null $date
     * @param int|null $edit
     */
    public function __construct(int $id = null, string $content = null, User $user_fk = null, Article $article_fk = null, string $date = null, int $edit = null) {
        $this->id = $id;
        $this->content = $content;
        $this->user_fk = $user_fk;
        $this->article_fk = $article_fk;
        $this->date = $date;
        $this->edit = $edit;
    }

    /**
     *  Return the id of Commentary
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Return the content of Commentary
     * @return string|null
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * Set the content of Commentary
     * @param string|null $content
     * @return Commentary
     */
    public function setContent(?string $content): Commentary {
        $this->content = $content;
        return $this;
    }

    /**
     * Return the User of Commentary
     * @return User|null
     */
    public function getUserFk(): ?User {
        return $this->user_fk;
    }

    /**
     * Set the User of Commentary
     * @param User|null $user_fk
     * @return Commentary
     */
    public function setUserFk(?User $user_fk): Commentary {
        $this->user_fk = $user_fk;
        return $this;
    }

    /**
     * Return the date of Commentary
     * @return string|null
     */
    public function getDate(): ?string {
        return $this->date;
    }

    /**
     * Set the date of Commentary
     * @param string|null $date
     * @return Commentary
     */
    public function setDate(?string $date): Commentary {
        $this->date = $date;
        return $this;
    }

    /**
     * Return the Article of Commentary
     * @return Article|null
     */
    public function getArticleFk(): ?Article {
        return $this->article_fk;
    }

    /**
     * Set the Article of Commentary
     * @param Article|null $article_fk
     * @return Commentary
     */
    public function setArticleFk(?Article $article_fk): Commentary {
        $this->article_fk = $article_fk;
        return $this;
    }

    /**
     * Return the information of edit of Commentary
     * @return int|null
     */
    public function getEdit(): ?int {
        return $this->edit;
    }

    /**
     * Set the information of edit of Commentary
     * @param int|null $edit
     * @return Commentary
     */
    public function setEdit(?int $edit): Commentary {
        $this->edit = $edit;
        return $this;
    }


}