<?php

namespace Squarebit\PTRules\Tests;

use PHPUnit\Framework\TestCase;
use Squarebit\PTRules\Rules\BI;
use Squarebit\PTRules\Rules\CompanyNIF;
use Squarebit\PTRules\Rules\NIF;

class BITest extends TestCase
{
    /**
     * @test
     * @dataProvider validBIs
     */
    public function it_passes_on_old_bi(int $input): void
    {
        $bi = new BI();
        self::assertTrue($bi->passes(null, $input));
    }

    /**
     * DATA PROVIDERS
     */
    public function validBIs(): array
    {
        return [
            [1074620],
            [225399210],
        ];
    }
}
