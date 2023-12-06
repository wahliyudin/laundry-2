<?php

namespace App\Enums;

enum Status: string
{
    case OPEN = 'open';
    case ON_PROCESS = 'on_process';
    case CLOSE = 'close';
}
