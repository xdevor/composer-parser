# ComposerParser

ComposerParser is a PHP package that allows you to parse all the installed PHP packages composer.json file. If you have ever worked with PHP packages, you know how important composer.json is. It describes the package's dependencies, version constraints, and other metadata like providers of laravel app. However, parsing all of the composer.json files in a project can be a tedious and time-consuming task, especially if you are working with multiple packages.

With ComposerParser, you can easily extract information from all of the composer.json files in your project.

<p align="left">
    <a href="https://github.com/xdevor/composer-parser/actions"><img src="https://github.com/xdevor/composer-parser/actions/workflows/tests.yml/badge.svg" alt="Test Status"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://poser.pugx.org/xdevor/composer-parser/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://img.shields.io/packagist/v/xdevor/composer-parser.svg?v=1.5.0" alt="packagist"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://poser.pugx.org/xdevor/composer-parser/license.svg" alt="License"></a>
</p>

## Installation
Require this package with composer:
```bash
composer require xdevor/composer-parser
```

## Features
- Supports parsing all installed PHP packages' composer.json files in your project
- Can easily extract specific information of nested composer.json files in your project

## Usage

1. parse specific installed package by key
```php
...
use Xdevor\ComposerParser\Parser;
...
(new Parser())->parse('the/package', 'name'); // return name of the package
(new Parser())->parse('the/package', 'authors.0.name'); // return the first author name
(new Parser())->parse('the/package', 'not_exist_key'); // return null if key not exist
(new Parser())->parse('the/package', 'not_exist_key', 'default'); // return 'default' if key not exist
(new Parser(__DIR__ . '/customize/path/installed.json'))->parse('the/package', 'name'); // parse customize path
```

2. parse all installed package by key
```php
...
use Xdevor\ComposerParser\Parser;
...
(new Parser())->parseAll($key = 'name'); // return name of all installed PHP packages
(new Parser())->parseAll($key = 'extra.laravel.providers'); // return providers of all installed PHP packages
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Code of Conduct

In order to ensure that the php community is welcoming to all, please review and abide by the [Code of Conduct](CODE_OF_CONDUCT.md).

## Security Vulnerabilities

Please review [our security policy](SECURITY.md) on how to report security vulnerabilities.

## License

ComposerParser is open-sourced software licensed under the [MIT license](LICENSE.md).
