<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsArchive;
use App\Models\UserPreference;
use App\Traits\ApiResponser;


class NewsController extends Controller
{
    use ApiResponser;

    
    /*
    * News Feed
    */
    public function newsFeed($userId)
    {
        $preference = UserPreference::where('user_id', $userId)->first()->category ?? null;
        $newsFeed = NewsArchive::whereIn('category', [$preference])->get();
        return $this->successResponse(['status'=> 200,'data'=> $newsFeed], 200);
    }   

     /*
    * All News
    */
    public function allNews()
    {
        $news = NewsArchive::all();
        return $this->successResponse(['status'=> 200,'data'=> $news], 200);
    }
}
