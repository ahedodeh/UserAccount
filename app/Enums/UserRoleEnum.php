<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class UserRoleEnum extends Enum
{
      const MAP = [
    'user',
    'admin',
  ];
}
