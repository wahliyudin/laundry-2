<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public function resetToNumber(string $val): int
    {
        return (int) str($val)
            ->replace('Rp. ', '')
            ->replace('.', '')
            ->value();
    }

    public static function formatRupiah($val, $withPrefix = false)
    {
        $result = number_format($val, 0, ',', '.');
        return $withPrefix ? "Rp. $result" : $result;
    }

    public static function getRangeInCarbon(string $range, $hasWithDefault = true): array
    {
        $range = str($range)->explode(' - ');
        return [
            count($range) >= 2 ? Carbon::createFromFormat('m/d/Y', $range[0]) : ($hasWithDefault ? now()->setDay(21) : null),
            count($range) >= 2 ? Carbon::createFromFormat('m/d/Y', $range[1]) : ($hasWithDefault ? now()->setDay(20)->addMonth() : null)
        ];
    }
}
