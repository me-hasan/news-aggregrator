<?php

namespace App\Http\Controllers;

use App\Models\NewsArchive;
use App\Services\NewsApiService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Nesw Api
     * @var AuthorService
     */
    public $newApiService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsApiService $newsApiService)
    {

        $this->newApiService = $newsApiService;
    }

    /**
     * Return the list of news and store
     * @return Illuminate\Http\Response
     */
    public function obtainNewsAndStore()
    {
         $newsArchive = $this->newApiService->newsFormatter()->toArray();
         NewsArchive::insert($newsArchive);

         return $this->successMessage('Successfully Saved!');

    }
}
