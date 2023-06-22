<?php

namespace App\Console\Commands;

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NewsApiController;

class PullNewsScheduled extends Command
{
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
        $controller = app(NewsApiController::class);
        $controller->obtainNewsAndStore();
    }
}
