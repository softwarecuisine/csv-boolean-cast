<?php

/**
 * @author Nikolay Smeh
 *
 * @see https://github.com/softwarecuisine/csv-boolean-cast
 * @package softwarecuisine/csv-boolean-cast
 * @license MIT
 */

namespace SoftwareCuisine\CSVBooleanCast;

class NotValidBooleanStringException extends NotValidBooleanException
{
    /** @phpstan-ignore-next-line */
    protected $message = 'The given value is not string boolean';
}
