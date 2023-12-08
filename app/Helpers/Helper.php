<?php

namespace App\Helpers;

class Helper
{
    public function resetToNumber(string $val): int
    {
        return (int) str($val)
            ->replace('Rp. ', '')
            ->replace('.', '')
            ->value();
    }

    public function formatRupiah($val, $withPrefix = false)
    {
        $result = number_format($val, 0, ',', '.');
        return $withPrefix ? "Rp. $result" : $result;
    }
}
