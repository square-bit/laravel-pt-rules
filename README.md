# Set of validation rules relevant for Portugal

[![Latest Stable Version](https://poser.pugx.org/square-bit/laravel-pt-rules/v)](//packagist.org/packages/square-bit/laravel-pt-rules)
[![License](https://poser.pugx.org/square-bit/laravel-pt-rules/license)](//packagist.org/packages/square-bit/laravel-pt-rules)
[![Total Downloads](https://poser.pugx.org/square-bit/laravel-pt-rules/downloads)](//packagist.org/packages/square-bit/laravel-pt-rules)

This package provides a set of Rules for Laravel 8 that are mainly useful to validate Portuguese ... stuff .... such as NIFs and CCs.

## Installation

Via Composer

``` bash
$ composer require square-bit/laravel-pt-rules
```

## Usage
Just like any other validation rule, simply add the desired class to the list of rules.
Example:
```
return Validator::make($data, [
    [...]
    'nif' => ['required', new NIF()],
    [...]
]);
```

## Available rules
| Class | Description                                                                                                                                     |
|-------|-------------------------------------------------------------------------------------------------------------------------------------------------|
| NIF   | Checks if the input is a valid Portuguese Fiscal ID number. Accepts both with and without the country preffix, ex: '123456789' or 'PT123456789' |
| BI    | Checks if the input is a valid Portuguese Identification Card number. (requires the entire number, including the last digit)                    |
| CC    | Checks if the input is a valid Portuguese Citizen Card number. (requires the full number, ex: "12233456 7 ZZ0")                                 |

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email info@square-bit.com instead of using the issue tracker.

## Credits

- [Squarebit][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[link-author]: https://github.com/square-bit
[link-contributors]: ../../contributors
