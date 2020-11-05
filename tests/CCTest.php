<?php

namespace Squarebit\PTRules\Tests;

use PHPUnit\Framework\TestCase;
use Squarebit\PTRules\Rules\CC;

class CCTest extends TestCase
{
    /**
     * @test
     * @dataProvider validCCs
     */
    public function it_passes_on_valid_ccs(string $input): void
    {
        $cc = new CC();
        self::assertTrue($cc->passes(null, $input));
    }

    /**
     * @test
     * @dataProvider invalidCCs
     */
    public function it_fails_on_invalid_ccs(string $input): void
    {
        $cc = new CC();
        self::assertFalse($cc->passes(null, $input));
    }

    /**
     * DATA PROVIDERS
     */
    public function validCCs(): array
    {
        return [
            ['14358948 2 ZV9'],
            ['18691431 8 ZW8'],
            ['15477836 2 ZY5'],
            ['13977381 9 ZY0'],
            ['18781001 0 ZV6'],
            ['15978968 0 ZY6'],
            ['12527054 2 ZZ3']
        ];
    }

    public function invalidCCs(): array
    {
        return [
            ['14358448 2 ZV9'],
            ['18691631 8 ZW8'],
            ['15437836 2 ZY5'],
            ['13977381 9 ZY3'],
            ['18781001 0 ZV1'],
            ['15978928 0 ZZ6'],
            ['12527054 1 ZZ3']
        ];
    }
}
