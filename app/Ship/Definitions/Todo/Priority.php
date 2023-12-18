<?php

declare(strict_types=1);

namespace App\Ship\Definitions\Todo;

enum Priority: int
{
    case Low = 0;
    case Medium = 1;
    case High = 2;
}
