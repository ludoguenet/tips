<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class StorePodcast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-podcast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lock = Cache::lock('store-podcast', 10);

        if ($lock->get()) {
            $this->line('Store Podcast processing...');
        } else {
            $this->line('not released yet.');
        }
    }
}
