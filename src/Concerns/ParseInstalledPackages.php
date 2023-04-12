<?php

namespace Xdevor\ComposerParser\Concerns;

trait ParseInstalledPackages
{
    use ParseArray;

    /**
     * @var string|null path of installed json file
     */
    protected $installedJsonPath = null;

    public function setInstalledJsonPath(?string $installedJsonPath)
    {
        $this->installedJsonPath = $installedJsonPath;
    }

    protected function parseAllByKey(string $key): array
    {
        $packages = $this->installedPackages();
        $result = [];

        foreach ($packages as $package) {
            $value = self::parseArray($package, $key);
            if (!is_null($value)) {
                $result[] = $value;
            }
        }

        return $result;
    }

    protected function parsePackageComposer(string $packageName, string $key, $default = null)
    {
        return self::parseArray($this->packageComposer($packageName), $key, $default);
    }

    protected function packageComposer(string $templatePackageName): array
    {
        $packages = $this->installedPackages();
        $packageComposer = [];

        foreach ($packages as $package) {
            if ($package['name'] === $templatePackageName) {
                $packageComposer = $package;
            }
        }

        return $packageComposer;
    }

    protected function installedPackages(): array
    {
        $packages = [];

        if (is_null($this->installedJsonPath)) {
            $installedJsonPath = file_exists(__DIR__ . '/../../vendor/composer/installed.json')
            ? __DIR__ . '/../../vendor/composer/installed.json'
            : __DIR__ . '/../../../../composer/installed.json';
        } else {
            $installedJsonPath = $this->installedJsonPath;
        }

        if (file_exists($installedJsonPath)) {
            $installed = json_decode(file_get_contents($installedJsonPath), true);
            $packages = $installed['packages'] ?? $installed;
        }

        return $packages;
    }
}
