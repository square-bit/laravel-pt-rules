<?php

declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

class BI extends NIF
{
    protected string $messageKey ='sb-laravel-pt::translations.invalidBI';

    public function passes($attribute, $bi): bool
    {
        if (preg_match('/^[0-9]{7,8}$/', (string) $bi)){
            return true;
        }

        return parent::passes($attribute, $bi);
    }
}
