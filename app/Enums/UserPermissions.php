<?php

namespace App\Enums;

enum UserPermissions: string
{
    case UPLOAD = 'Upload';
    case DELETE = 'Delete';
}
