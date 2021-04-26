<?php


namespace Model\Entity;

class Commentary {

    private ?int $id;
    private ?string $content;
    private ?User $user_fk;
    private ?string $date;

    /**
     * Commentary constructor.
     * @param int|null $id
     * @param string|null $content
     * @param User|null $user_fk
     * @param string|null $date
     */
    public function __construct(int $id = null, string $content = null, User $user_fk = null, string $date = null) {
        $this->id = $id;
        $this->content = $content;
        $this->user_fk = $user_fk;
        $this->date = $date;
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


}