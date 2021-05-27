
# CSV Boolean Cast

A tiny PHP helper casts the Excel boolean words to the boolean value.

Very often some of us need to parse CSV contains boolean values. The problems happen then you need to work with non-english sources because of the different naming of `true` and `false` in different languages. 

Now you don't need to look for all possible translation. This helper solve the problem.

Right now the package supports next languages:

* Basque
* German
* Danish
* Finnish
* French
* Galician
* Italian
* Catalan
* Dutch
* Norwegian
* Polish
* Portuguese, Brazil
* Portuguese, Portugal
* Russian
* Swedish
* Spanish
* Czech
* Turkish
* Hungarian 

## Installation 

Install CSV Boolean Cast with Composer

```bash 
  composer require softwarecuisine/csv-boolean-cast 
```
    
## Usage/Examples

*CSV Sample with boolean values mixed in German and Polish*
```csv
id,name,company
1,Test GmbH,WAHR
2,Herr Schmidt,FALSE
3,Beispiel UG,WAHR
```

*Code example*
```php

use SoftwareCuisine\CSVBooleanCast\CSVBooleanCast;

class CSVReader
{
    public function read(): void
    {
        $csv = "id,name,company
                1,Test GmbH,WAHR
                2,Herr Schmidt,FALSE
                3,Beispiel UG,WAHR";

        $result = [];

        $rows = explode(PHP_EOL, $csv);

        foreach ($rows as $index => $row) {
            if ($index > 0) {
                $columns = str_getcsv(trim($row));
                $result[] = CSVBooleanCast::cast($columns[2]);
            }
        }

        var_dump($result);
    }
}

(new CSVReader)->read();
```

*Output*
```bash
array(3) {
  [0] =>
  bool(true)
  [1] =>
  bool(false)
  [2] =>
  bool(true)
}
```

  
## Used By

Please, message me, if you use this package, to be mentioned here.
  
## Authors

- [@softwarecuisine](https://www.github.com/softwarecuisine)

  
## License

[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)

[MIT License Text](https://choosealicense.com/licenses/mit/)

  
## Feedback

If you have any feedback, please reach out to me at nikolay@nikolay.ws

  
## Support

You can support me buying a coffee
https://www.buymeacoffee.com/softwarecuisine

  