<?php

namespace App\Jobs;

use App\Models\NewsArchive;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

      /**
     * The service to consume the News Api
     * @var NewApiService
     */
    public $newsApiService;
    

    /**
     * Create a new job instance.
     */
    public function __construct($newsApiService)
    {
        $this->newsApiService = $newsApiService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $newsArray = $this->newsApiService->getDataFromSource()->toArray();
        
        NewsArchive::insert($newsArray);
    }
}
