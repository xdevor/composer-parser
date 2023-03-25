<?php

use Xdevor\ComposerParser\Parser;

test('It can return correct value if key exist', function () {
    $package = 'doctrine/instantiator';
    $illuminateSupportName = (new Parser())->parse($package, 'name');
    expect($illuminateSupportName)->toBe($package);
});

test('It return default if key not exist', function () {
    $package = 'ooo/xxx';
    $illuminateSupportName = (new Parser())->parse($package, 'name', null);
    expect($illuminateSupportName)->toBe(null);
});

test('It can return correct value if array key exist', function () {
    $package = 'doctrine/instantiator';
    $illuminateSupportName = (new Parser())->parse($package, 'license.0');
    expect($illuminateSupportName)->toBe('MIT');
});
