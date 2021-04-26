<?php

namespace Model\User;

use Model\DB;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;
use Model\Manager\RoleManager;

class UserManager {

    use ManagerTrait;

    /**
     * Return an User by his id
     * @param int $id
     * @return User
     */
    public function getById(int $id): User {
        $user = new User();
        $request = DB::getInstance()->prepare("SELECT id, username FROM user WHERE id = :user_fk");
        $request->bindValue(':user_fk', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setUsername($user_data['username']);
            }
        }

        return $user;
    }

    /**
     * Return an User by his user name or null
     * @param string $username
     * @return User|null
     */
    public function log(string $username): ?User {
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE username = :username");
        $request->bindValue(':username', $username);
        $result = $request->execute();
        $user = null;

        if($result && $data = $request->fetch()) {
            $role = RoleManager::getManager()->get($data['role_fk']);
            $user = new User($data['username'], $data['password'], $data['id'], $data['mail'], $role);
        }

        return $user;
    }

    public function add(User $user): bool {
        $request = DB::getInstance()->prepare("INSERT INTO user (username, mail, password, role_fk) VALUES (:username, :mail, :password, :role)");

        $request->bindValue(":username", $user->getUsername());
        $request->bindValue(":mail", $user->getMail());
        $request->bindValue(":password", $user->getPassword());
        $request->bindValue(":role", $user->getRole()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }
}