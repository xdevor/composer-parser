# ComposerParser

A parser that can parse the composer.json file of installed PHP packages.

## Installation
Require this package with composer:
```bash
composer require xdevor/composer-parser
```

## Usage

1. parse composer.json file of installed PHP packages
```php
(new Parser())->parse('the/package', 'name'); // return name of the package
(new Parser())->('the/package', 'not_exist_key'); // return null
(new Parser())->('the/package', 'authors.0.name'); // return the first author name
```

## License

ComposerParser is open-sourced software licensed under the [MIT license](LICENSE.md).
