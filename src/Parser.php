<?php

namespace Xdevor\ComposerParser;

use Xdevor\ComposerParser\Concerns\ParseInstalledPackages;

class Parser
{
    use ParseInstalledPackages;

    public function __construct(string $installedJsonPath = null)
    {
        $this->setInstalledJsonPath($installedJsonPath);
    }

    public function parse(string $packageName, string $key, $default = null)
    {
        return $this->parsePackageComposer($packageName, $key, $default);
    }

    public function parseAll(string $key): array
    {
        return $this->parseAllByKey($key);
    }
}