<?php

declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class NIF implements Rule
{
    public function passes($attribute, $nif): bool
    {
        $nif = str_replace([' ', '-', '.', ','], '', trim((string)$nif));

        // remove the country code if needed
        if (strlen($nif) === 11) {
            if (strpos($nif, 'PT') !== 0) {
                return false;
            }
            $nif = substr($nif, 2);
        }

        $nif_split = str_split($nif);
        $nif_primeiros_digito = [1, 2, 3, 5, 6, 7, 8, 9];
        if (is_numeric($nif) && strlen($nif) === 9 && in_array($nif_split[0], $nif_primeiros_digito)) {
            $check_digit = 0;
            for ($i = 0; $i < 8; $i ++) {
                $check_digit += $nif_split[$i] * (10 - $i - 1);
            }
            $check_digit = 11 - ($check_digit % 11);
            $check_digit = $check_digit >= 10 ? 0 : $check_digit;
            if ($check_digit === (int)$nif_split[8]) {
                return true;
            }
        }

        return false;
    }

    public function message(): string
    {
        return trans('sb-laravel-pt::invalidNIF');
    }
}
