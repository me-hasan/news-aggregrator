<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     */
    public function registration(Request $request) : Response
    {
        $parameters = $request->all();
         // Hash the 'password' parameter if it exists
        if (isset($parameters['password'])) {
            $parameters['password'] = Hash::make($parameters['password']);
        }
        $user = User::create($parameters);
        if(isset($user)){
            return Response(['status'=> 200, 'message'=> 'User create successfully!'], 200);
        }
        return Response(['status'=> 200, 'message'=> 'Something wrong went!'], 200);
    }


    /**
     * Display a listing of the resource.
     */
    public function loginUser(Request $request) : Response
    {
        $input = $request->all();
        Auth::attempt($input);
        $user = Auth::user();
        if(isset($user)){
            $token = $user->createToken('News')->accessToken;
            return Response(['status'=> 200, 'token'=> $token], 200);
        }else{
            return Response(['status'=> 201, 'message'=> 'Credentials is not valid!'], 201);
        }
    }

    /**
     * Get User Information.
     */
    public function getuserInfo() : Response
    {
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return Response(['status'=> 200, 'data'=> $user], 200);
        }
        return Response(['status'=> 401, 'data'=> 'Unathenticated'], 401);
        
    }

    /**
     * User Logout.
     */
    public function userLogout() : Response
    {
        if(Auth::guard('api')->check()){
            $accessToken = Auth::guard('api')->user()->token();
            \DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
            $accessToken->revoke();

            return Response(['status'=> 200, 'message'=> 'User logout successfully'], 200);
        }
        $this->errorResponse('dfsdfs', 401);

    }

    
}
