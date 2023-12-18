<?php

declare(strict_types=1);

namespace App\Ship\Definitions\Todo;

enum Status: int
{
    case Todo = 0;
    case Inprogress = 1;
    case Done = 2;
}
