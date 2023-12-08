<?php

namespace App\Enums;

enum Status: string
{
    case OPEN = 'open';
    case ON_PROCESS = 'on_process';
    case CLOSE = 'close';

    public function label()
    {
        return match ($this) {
            self::OPEN => 'Open',
            self::ON_PROCESS => 'On Process',
            self::CLOSE => 'Close',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::OPEN => '<span class="badge bg-warning">' . self::OPEN->label() . '</span>',
            self::ON_PROCESS => '<span class="badge bg-info">' . self::ON_PROCESS->label() . '</span>',
            self::CLOSE => '<span class="badge bg-success">' . self::CLOSE->label() . '</span>',
        };
    }
}
