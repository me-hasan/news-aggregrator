<?php

namespace App\Services;

use App\Models\NewsArchive;
use App\Traits\ConsumesExternalService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class NewsApiService implements NewsInterface
{
    use ConsumesExternalService;

    /**
     * The api uri path
     * @var string
     */
    public $uri;

    
    public function __construct()
    {
        $this->uri = config('newssources.external_api.news_api.url');
    }


    /**
     * Obtain the full list of news from api
     * @return string
     */
    public function getDataFromSource(){
        $newsList = $this->performRequest('GET');
        $newsObject = collect(json_decode($newsList)->sources);
        return $this->newsFormatter($newsObject);
    }


    /**
     * Formate data for storing to database
     * @return string
     */
    public function newsFormatter($newsObject)
    {
        $newsCollection = new Collection();
        $newsObject->map(function ($news) use ($newsCollection){
            return $newsCollection->push(
                [
                    'news_id' => $news->id,
                    'name' => $news->name,
                    'description' => $news->description,
                    'url' => $news->url,
                    'category' => $news->category,
                    'country' => $news->country,
                    'language' => $news->language,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
         });
         return $newsCollection;    
    }
}