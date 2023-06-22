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
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

    


    public function __construct()
    {
        $this->baseUri = config('services.external_api.news_api');
    }

    /**
     * Obtain the full list of news from api and store to database
     * @return string
     */
    public function newsFormatter()
    {
        $newsList = $this->performRequest('GET');
        
        $newsObject = collect(json_decode($newsList)->sources);
        
        $newsCollection = new Collection();
        $newsObject->map(function ($news) use ($newsCollection){
            if(!NewsArchive::where('news_id', $news->id)->exists()){
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
            }
         });
         return $newsCollection;
           
        
    }


}