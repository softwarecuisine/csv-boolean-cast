<?php

/**
 * @author Nikolay Smeh
 *
 * @see https://github.com/softwarecuisine/csv-boolean-cast
 * @package softwarecuisine/csv-boolean-cast
 * @license MIT
 */

namespace SoftwareCuisine\CSVBooleanCast\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SoftwareCuisine\CSVBooleanCast\CSVBooleanCast;
use SoftwareCuisine\CSVBooleanCast\NotValidBooleanStringException;
use SoftwareCuisine\CSVBooleanCast\NotValidBooleanIntException;

final class CSVBooleanCastTest extends TestCase
{
    public function testValueIsValidIntTrue(): void
    {
        $str = 1;
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(true, $res);
    }

    public function testValueIsValidIntFalse(): void
    {
        $str = 0;
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(false, $res);
    }

    public function testValueIsInvalidInt(): void
    {
        $this->expectException(NotValidBooleanIntException::class);
        $str = -100;
        CSVBooleanCast::cast($str);
    }

    public function testValueIsValidEnStringFalse(): void
    {
        $str = 'FALSE';
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(false, $res);
    }

    public function testValueIsValidDeStringFalse(): void
    {
        $str = 'FALSCH';
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(false, $res);
    }

    public function testValueIsValidEnStringTrue(): void
    {
        $str = 'TRUE';
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(true, $res);
    }

    public function testValueIsValidRuStringTrue(): void
    {
        $str = 'ИСТИНА';
        $res = CSVBooleanCast::cast($str);
        $this->assertIsBool($res);
        $this->assertEquals(true, $res);
    }

    public function testValueIsInvalidString(): void
    {
        $this->expectException(NotValidBooleanStringException::class);
        $str = 'ABC';
        CSVBooleanCast::cast($str);
    }
}