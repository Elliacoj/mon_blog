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
    public function getById(int $id): ?User {
        $user = null;
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :user_fk");
        $request->bindValue(':user_fk', $id);
        $result = $request->execute();

        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $role = RoleManager::getManager()->get($user_data['role_fk']);
                $user = new User($user_data['username'], $user_data['password'], $user_data['id'], $user_data['mail'], $role);
            }
        }

        return $user;
    }

    /**
     * Return an User by his user name or null
     * @param string $mail
     * @return User|null
     */
    public function log(string $mail): ?User {
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);
        $result = $request->execute();
        $user = null;

        if($result && $data = $request->fetch()) {
            $role = RoleManager::getManager()->get($data['role_fk']);
            $user = new User($data['username'], $data['password'], $data['id'], $data['mail'], $role);
        }

        return $user;
    }

    /**
     * Add an user into table user
     * @param User $user
     * @return bool
     */
    public function add(User $user): bool {
        $request = DB::getInstance()->prepare("INSERT INTO user (username, mail, password, role_fk) VALUES (:username, :mail, :password, :role)");

        $request->bindValue(":username", $user->getUsername());
        $request->bindValue(":mail", $user->getMail());
        $request->bindValue(":password", password_hash($user->getPassword(), PASSWORD_BCRYPT));
        $request->bindValue(":role", $user->getRole()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }
}