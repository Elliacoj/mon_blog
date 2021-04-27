<?php

namespace Model\Entity;

class Article {

    private ?int $id;
    private ?string $content;
    private ?string $title;
    private ?string $subTitle;
    private ?string $resume;
    private ?string $date;

    /**
     * Article constructor.
     * @param string|null $content
     * @param int|null $id
     * @param string|null $title
     * @param string|null $subTitle
     * @param string|null $resume
     * @param string $date
     */
    public function __construct(string $content = null, int $id= null, string $title = null, string $subTitle = null, string $resume = null, string  $date = null) {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->resume = $resume;
        $this->date = $date;
    }

    /**
     * Return the id of Article
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Return the content of Article
     * @return string
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * Set the content of Article
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): Article {
        $this->content = $content;
        return $this;
    }

    /**
     * Return the title of Article
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the title of Article
     * @param string|null $title
     * @return Article
     */
    public function setTitle(?string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Return the sub title of Article
     * @return string|null
     */
    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    /**
     * Set the sub title of Article
     * @param string|null $subTitle
     * @return Article
     */
    public function setSubTitle(?string $subTitle): Article
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    /**
     * Return the resume of Article
     * @return string|null
     */
    public function getResume(): ?string
    {
        return $this->resume;
    }

    /**
     * Set the resume of Article
     * @param string|null $resume
     * @return Article
     */
    public function setResume(?string $resume): Article
    {
        $this->resume = $resume;
        return $this;
    }

    /**
     * Return the date of Article
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the date of Article
     * @param string|null $date
     * @return Article
     */
    public function setDate(?string $date): Article
    {
        $this->date = $date;
        return $this;
    }

}