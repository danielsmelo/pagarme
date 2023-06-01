<?php

namespace Danielsmelo\Pagarme\Commands;

use Illuminate\Console\Command;

class PagarmeCommand extends Command
{
    public $signature = 'pagarme';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
