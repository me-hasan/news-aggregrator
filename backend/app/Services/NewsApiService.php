<?php

namespace App\Services;

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
        
        $object = json_decode($newsList)->sources;

        $collection = new Collection();
            foreach($object as $key=>$item){
                $collection->push([
                'news_id' => $object[$key]->id,
                'name' => $object[$key]->name,
                'description' => $object[$key]->description,
                'url' => $object[$key]->url,
                'category' => $object[$key]->category,
                'country' => $object[$key]->country,
                'language' => $object[$key]->language
            ]);
        }   

        return $collection;   
        
    }


}