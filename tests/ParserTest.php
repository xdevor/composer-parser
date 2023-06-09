<?php

use Xdevor\ComposerParser\Parser;

test('It can return correct value if key exist', function () {
    $packageName = 'doctrine/instantiator';
    $actual = (new Parser())->parse($packageName, 'name');
    expect($actual)->toBe($packageName);
});

test('It return null if key not exist', function () {
    $packageName = 'ooo/xxx';
    $actual = (new Parser())->parse($packageName, 'name');
    expect($actual)->toBe(null);
});

test('It return default value if key not exist', function ($key) {
    $packageName = 'ooo/xxx';
    $actual = (new Parser())->parse($packageName, $key, 'this_is_default');
    expect($actual)->toBe('this_is_default');
})->with([
    'name',
    'author.name'
]);

test('It can return correct value if array key exist', function () {
    $packageName = 'doctrine/instantiator';
    $actual = (new Parser())->parse($packageName, 'license.0');
    expect($actual)->toBe('MIT');
});

test('It can use custom installed.json path', function () {
    $packageName = 'filp/whoops';
    $actual = (new Parser(__DIR__ . '/../tests/assets/fakeInstalled.json'))->parse($packageName, 'extra.branch-alias.dev-master');
    expect($actual)->toBe('2.7-test-dev');
});

test('It can parse all by key', function () {
    $actual = (new Parser(__DIR__ . '/../tests/assets/fakeInstalled.json'))->parseAll('name');
    expect($actual)->toBe(['filp/whoops', 'phar-io/manifest', 'phar-io/version', 'phpstan/phpstan']);
});

test('It return empty array if key not exist on parse all method', function () {
    $actual = (new Parser(__DIR__ . '/../tests/assets/fakeInstalled.json'))->parseAll('xxx.ooo.xxx');
    expect($actual)->toBe([]);
});
