<?php

namespace App\Console\Commands;

namespace App\Console\Commands;

use Illuminate\Console\Command;



class PullNewsScheduled extends Command
{
    /**
     * The external api to consume the news api
     * @var string
     */
    public $externalApi;

    

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:pull-news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull News from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        $apiConfig = config('newssources.external_api');
        foreach($apiConfig as $key=> $config){
            $config['job']::dispatch(new $config['service']);
        }
        
          
    }
}
