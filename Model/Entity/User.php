<?php

namespace Model\Entity;

class User {

    private ?int $id;
    private ?string $username;
    private ?string $password;
    private ?string $mail;
    private ?Role $role;

    /**
     * User constructor.
     * @param string|null $username
     * @param string|null $password
     * @param int|null $id
     * @param string|null $mail
     * @param Role|null $role
     */
    public function __construct(string $username = null, string $password = null, int $id = null, string $mail = null, Role $role = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->role = $role;
    }


    /**
     * Return the id of User
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }


    /**
     * Return the user name of User
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * Set the user name of User
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User {
        $this->username = $username;
        return $this;
    }

    /**
     * Return the password of User
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User {
        $this->password = $password;
        return $this;
    }

    /**
     * Return the mail of User
     * @return string|null
     */
    public function getMail(): ?string {
        return $this->mail;
    }

    /**
     * Set the mail of User
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Return the role of User
     * @return Role
     */
    public function getRole(): Role {
        return $this->role;
    }

    /**
     * Set the role of User
     * @param Role|null $role
     */
    public function setRole(?Role $role): void {
        $this->role = $role;
    }
}