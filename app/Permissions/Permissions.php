<?php

namespace App\Permissions;

enum Permissions {

    case CAN_ADMINISTRATE_ROLES;
    case CAN_ADMINISTRATE_ROLE_PERMISSIONS;

    /**
     * @return string
     */
    public function getName(): string
    {
        return strtolower($this->name);
    }
}
