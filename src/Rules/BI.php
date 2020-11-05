<?php

declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

class BI extends NIF
{
    public function message(): string
    {
        return trans('sb-laravel-pt::invalidBI');
    }
}
