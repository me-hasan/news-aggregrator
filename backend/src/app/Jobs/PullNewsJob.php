<?php

namespace App\Jobs;

use App\Models\NewsArchive;
use App\Services\NewsInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PullNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The service to consume the Api
     * @var NewsInterface
     */
    public $newsInterface;
    

    /**
     * Create a new job instance.
     */
    public function __construct(NewsInterface $newsInterface) 
    {
        $this->newsInterface = $newsInterface;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $newsArray = $this->newsInterface->getDataFromSource()->toArray();
        
        NewsArchive::insert($newsArray);
    }
}
