<?php

namespace App\Enums;

enum UserRoles: string
{
    case ADMIN = 'Admin';
    case AGENT = 'Agent';
    case CUSTOMER = 'Customer';
}
