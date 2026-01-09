<?php

namespace App\Console\Commands;

use App\Services\YoudaoTranslateService;
use Illuminate\Console\Command;

class YoudaoTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:youdao-translate {text} {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(YoudaoTranslateService $translator)
    {
        var_dump($translator->translate($this->argument('text'), $this->argument('from'), $this->argument('to')));
    }
}
