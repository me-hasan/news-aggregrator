<?php

namespace App\Console\Commands;

use App\Jobs\PullNewsJob;
use Illuminate\Console\Command;

class UpdateNewsArchive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-news-archive:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull news from API and update \'News Archive\' table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiConfig = config('newssources.external_api');
        foreach($apiConfig as $key=> $config){
            PullNewsJob::dispatch(new $config['service']);
        }  
    }
}
