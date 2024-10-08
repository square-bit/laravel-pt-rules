<?php

declare(strict_types=1);

namespace Squarebit\PTRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class CC implements Rule
{
    protected $cc='';

    protected string $messageKey = 'sb-laravel-pt::translations.invalidCC';

    public function passes($attribute, $cc): bool
    {
        $this->cc = $cc;

        $cc = str_replace([' ', '-', '.', ','], '', trim((string) $cc));
        $cardNumber = strtoupper($cc);
        $sum = 0;
        $secondDigit = false;
        if (strlen($cardNumber) !== 12) {
            return false;
        }

        for ($i = strlen($cardNumber) - 1; $i >= 0; $i--) {
            $value = $this->getNumberFromChar($cardNumber[$i]);
            if ($secondDigit) {
                $value *= 2;
                if ($value > 9) {
                    $value -= 9;
                }
            }
            $sum += $value;
            $secondDigit = ! $secondDigit;
        }

        return ($sum % 10) === 0;
    }

    public function message(): string
    {
        return trans($this->messageKey, ['cc' => $this->cc]);
    }

    private function getNumberFromChar($letter): int
    {
        if (is_numeric($letter)) {
            return (int) $letter;
        }

        return ord($letter) - 55;
    }
}
