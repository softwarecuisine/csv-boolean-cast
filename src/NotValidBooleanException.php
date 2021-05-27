<?php

/**
 * @author Nikolay Smeh
 *
 * @see https://github.com/softwarecuisine/csv-boolean-cast
 * @package softwarecuisine/csv-boolean-cast
 * @license MIT
 */

namespace SoftwareCuisine\CSVBooleanCast;

class NotValidBooleanException extends \Exception
{
    /** @phpstan-ignore-next-line */
    protected $message = 'The given value can not be casted to the boolean';
}
