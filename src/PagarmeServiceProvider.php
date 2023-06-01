<?php

namespace Danielsmelo\Pagarme;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Danielsmelo\Pagarme\Commands\PagarmeCommand;

class PagarmeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('pagarme')
            ->hasConfigFile()
            ->hasCommand(PagarmeCommand::class);
    }
}
