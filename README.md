# ComposerParser

A parser that can parse the composer.json file of installed PHP packages.

<p align="left">
    <a href="https://github.com/xdevor/composer-parser/actions"><img src="https://github.com/xdevor/composer-parser/actions/workflows/tests.yml/badge.svg" alt="Test Status"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://poser.pugx.org/xdevor/composer-parser/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://poser.pugx.org/xdevor/composer-parser/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/xdevor/composer-parser"><img src="https://poser.pugx.org/xdevor/composer-parser/license.svg" alt="License"></a>
</p>

## Installation
Require this package with composer:
```bash
composer require xdevor/composer-parser
```

## Usage

1. parse composer.json file of installed PHP packages
```php
...
use Xdevor\ComposerParser\Parser;
...
(new Parser())->parse('the/package', 'name'); // return name of the package
(new Parser())->parse('the/package', 'not_exist_key'); // return null
(new Parser())->parse('the/package', 'authors.0.name'); // return the first author name
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](CODE_OF_CONDUCT.md).

## Security Vulnerabilities

Please review [our security policy](SECURITY.md) on how to report security vulnerabilities.

## License

ComposerParser is open-sourced software licensed under the [MIT license](LICENSE.md).
