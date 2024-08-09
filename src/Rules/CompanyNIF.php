<?php
declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

class CompanyNIF extends NIF
{
    protected string $messageKey = 'sb-laravel-pt::translations.invalidCompanyNIF';

    public function passes($attribute, $nif): bool
    {
        $this->nif = $nif;
        $nif = $this->clean($nif);

        return (str_starts_with($nif, '5') || str_starts_with($nif, '9')) &&
            $this->check($nif);
    }
}
