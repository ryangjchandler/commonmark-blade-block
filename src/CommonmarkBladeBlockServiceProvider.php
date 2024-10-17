<?php

namespace RyanChandler\CommonmarkBladeBlock;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CommonmarkBladeBlockServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('commonmark-blade-block');
    }
}
