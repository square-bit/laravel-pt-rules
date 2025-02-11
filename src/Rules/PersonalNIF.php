<?php
declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

class PersonalNIF extends NIF
{
    protected string $messageKey = 'sb-laravel-pt::translations.invalidPersonalNIF';

    public function passes($attribute, $nif): bool
    {
        $this->nif = $nif;
        $nif = $this->clean($nif);

        return (
            str_starts_with($nif, '1') ||
            str_starts_with($nif, '2') ||
            str_starts_with($nif, '3') ||
            str_starts_with($nif, '4')
            ) &&
            $this->check($nif);
    }
}
