<?php

namespace App\Enums;

enum StatusBayar: string
{
    case BELUM_LUNAS = 'belum_lunas';
    case LUNAS = 'lunas';

    public function label()
    {
        return match ($this) {
            self::BELUM_LUNAS => 'Belum Lunas',
            self::LUNAS => 'Lunas',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::BELUM_LUNAS => '<span class="badge bg-warning">' . self::BELUM_LUNAS->label() . '</span>',
            self::LUNAS => '<span class="badge bg-succcess">' . self::LUNAS->label() . '</span>',
        };
    }
}
