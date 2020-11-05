<?php

namespace Squarebit\PTRules;

use Illuminate\Support\ServiceProvider;

class PTRulesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'sb-laravel-pt');
    }
}
