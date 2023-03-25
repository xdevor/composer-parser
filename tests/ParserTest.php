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
    expect($actual)->toBe('2.7-dev');
});
