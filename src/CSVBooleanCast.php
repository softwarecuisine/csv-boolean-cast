<?php

/**
 * @author Nikolay Smeh
 *
 * @see https://github.com/softwarecuisine/csv-boolean-cast
 * @package softwarecuisine/csv-boolean-cast
 * @license MIT
 */

namespace SoftwareCuisine\CSVBooleanCast;

use SoftwareCuisine\CSVBooleanCast\NotValidBooleanStringException;
use SoftwareCuisine\CSVBooleanCast\NotValidBooleanIntException;

class CSVBooleanCast
{
    protected const FALSE_TRANSLATIONS = [
        'Baskisch' => 'FALTSUA',
        'Deutsch' => 'FALSCH',
        'Dänisch' => 'FALSK',
        'Finnisch' => 'EPÄTOSI',
        'English' => 'FALSE',
        'Französisch' => 'FAUX',
        'Galizisch' => 'FALSO',
        'Italienisch' => 'FALSO',
        'Katalanisch' => 'FALS',
        'Niederländisch' => 'ONWAAR',
        'Norwegisch' => 'USANN',
        'Polnisch' => 'FAŁSZ',
        'Portugiesisch, Brasilien' => 'FALSO',
        'Portugiesisch, Portugal' => 'FALSO',
        'Russisch' => 'ЛОЖЬ',
        'Schwedisch' => 'FALSKT',
        'Spanisch' => 'FALSO',
        'Tschechisch' => 'NEPRAVDA',
        'Türkisch' => 'YANLIŞ',
        'Ungarisch' => 'HAMIS',
        'Schwedisch_2010' => 'FALSK',
    ];

    protected const TRUE_TRANSLATIONS = [
        'Baskisch' => 'EGIAZKOA',
        'Deutsch' => 'WAHR',
        'Dänisch' => 'SAND',
        'English' => 'TRUE',
        'Finnisch' => 'TOSI',
        'Französisch' => 'VRAI',
        'Galizisch' => 'VERDADEIRO',
        'Italienisch' => 'VERO',
        'Katalanisch' => 'CERT',
        'Niederländisch' => 'WAAR',
        'Norwegisch' => 'SANN',
        'Polnisch' => 'PRAWDA',
        'Portugiesisch, Brasilien' => 'VERDADEIRO',
        'Portugiesisch, Portugal' => 'VERDADEIRO',
        'Russisch' => 'ИСТИНА',
        'Schwedisch' => 'SANT',
        'Spanisch' => 'VERDADERO',
        'Tschechisch' => 'PRAVDA',
        'Türkisch' => 'DOĞRU',
        'Ungarisch' => 'IGAZ',
        'Schwedisch_2010' => 'SANN',
    ];


    /**
     * The method casts the value to the boolean or occurs an exeption
     *
     * @param  int|string $value
     * @throws NotValidBooleanStringException
     * @return boolean
     */
    public static function cast($value): bool
    {
        if (is_int($value)) {
            return (new self)->castInt($value);
        }

        return (new self)->castString($value);
    }

    /**
     * The method cast the string value to bool
     *
     * @param  string $value
     * @return boolean
     * @throws NotValidBooleanStringException
     */
    protected function castString(string $value): bool
    {
        if (in_array(mb_strtoupper($value), self::FALSE_TRANSLATIONS)) {
            return false;
        }

        if (in_array(mb_strtoupper($value), self::TRUE_TRANSLATIONS)) {
            return true;
        }

        throw new NotValidBooleanStringException();
    }

    /**
     * The method cast the integer value to bool
     *
     * @param  int $value
     * @return boolean
     */
    protected function castInt(int $value): bool
    {
        switch ($value) {
            case 0:
                return false;
            
            case 1:
                return true;
            
            default:
                throw new NotValidBooleanIntException();
        }
    }
}
