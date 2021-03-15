<?php

namespace Squarebit\PTRules\Tests;

use PHPUnit\Framework\TestCase;
use Squarebit\PTRules\Rules\NIF;

class NIFTest extends TestCase
{
    /**
     * @test
     * @dataProvider validNIFs
     */
    public function it_passes_on_valid_nifs(int $input): void
    {
        $nif = new NIF();
        self::assertTrue($nif->passes(null, $input));
    }

    /**
     * @test
     * @dataProvider invalidNIFs
     */
    public function it_fails_on_invalid_nifs(int $input): void
    {
        $nif = new NIF();
        self::assertFalse($nif->passes(null, $input));
    }

    /**
     * DATA PROVIDERS
     */
    public function validNIFs(): array
    {
        return [
            [209895071],
            [225399210],
            [213334607],
            [260594636],
            [510960316],
            [770007694],
            [980088542],
        ];
    }

    public function invalidNIFs(): array
    {
        return [
            [209890073],
            [225399215],
            [213334606],
            [260594634],
            [510960315],
            [770007692],
            [980088541],
        ];
    }
}
