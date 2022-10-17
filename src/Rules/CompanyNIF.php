<?php
declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

class CompanyNIF extends NIF
{
    public function passes($attribute, $nif): bool
    {
        $nif = $this->clean($nif);

        return (str_starts_with((string) $nif, '5') || str_starts_with((string) $nif, '9')) &&
            $this->check($nif);
    }

    public function message(): string
    {
        return trans('sb-laravel-pt::translations.invalidCompanyNIF');
    }
}
