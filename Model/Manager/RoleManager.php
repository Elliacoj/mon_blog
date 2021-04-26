<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\Role;
use Model\Manager\Traits\ManagerTrait;

class RoleManager
{
    use ManagerTrait;

    /**
     * Return a Role or null
     * @param $id
     * @return Role|null
     */
    public function get($id): ?Role {
        $role = null;
        $request = DB::getInstance()->prepare("Select * FROM role WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result && $data = $request->fetch()) {
            $role = new Role($data['id'], $data['name']);
        }

        return $role;
    }
}