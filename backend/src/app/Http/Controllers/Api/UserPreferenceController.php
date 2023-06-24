<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsArchive;
use App\Models\UserPreference;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;


class UserPreferenceController extends Controller
{
    use ApiResponser;

    /**
     * Return the list of user's preference.
     */
    public function Index() : Response
    {
        $preferences = UserPreference::all();
        return $this->successResponse(['status'=> 200,'data'=> $preferences], 200);
        
    }


    /**
     * create new preference
     */
    public function store(Request $request) : Response
    {
        $parameters = $request->all();

        $rules = [
            'user_id' => 'required',
            'category' => 'required',
            'language' => 'required',
            'country' => 'required',
            'author' => 'required'
        ];

        $this->validate($request, $rules);

        $preference = UserPreference::create($parameters);
        
        return $this->successResponse($preference, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show preference
     */
    public function show($preference) : Response
    {
        $preference = UserPreference::findOrFail($preference);
        return $this->successResponse(['status'=> 200,'data'=> $preference], 200);
        
    }

    /**
     * Update an existing preference
     */
    public function update(Request $request, $preference) 
    {
        $rules = [
            'user_id' => 'required',
            'category' => 'required',
            'language' => 'required',
            'country' => 'required',
            'author' => 'required'
        ];

        $this->validate($request, $rules);

        $preference = UserPreference::findOrFail($preference);

        $preference->fill($request->all());

        
        if($preference->isClean()){
            return $this->errorResponse('At least one value need to be changed!', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $preference->save();

        return $this->successResponse(['status'=> 200,'message'=> 'Successfully Updated!'], 200);
    }

    /**
     * Remove an existing preference
     */
    public function destroy($preference) 
    {
        $preference = UserPreference::findOrFail($preference);
        $preference->delete();
        return $this->successResponse(['status'=> 200,'message'=> 'Successfully Deleted!'], 200);

    }

    /*
    * News Feed
    */
    public function newsFeed()
    {
        $userId = Auth::guard('api')->user()->id ?? null;
        $preference = UserPreference::where('user_id', $userId)->first()->category ?? null;
        $newsFeed = NewsArchive::whereIn('category', [$preference])->get();
        return $this->successResponse(['status'=> 200,'data'=> $newsFeed], 200);
    }   
}
