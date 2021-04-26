<?php

namespace Model\Entity;

class Article {

    private ?int $id;
    private string $content;
    private User $user;

    /**
     * Article constructor.
     * @param int|null $id
     * @param string $content
     * @param User $user
     */
    public function __construct(string $content, int $id= null) {
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * Return the id of article
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Return the content of article
     * @return string
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * Set the content of article
     * @param string $content
     */
    public function setContent(string $content): Article {
        $this->content = $content;
        return $this;
    }
}