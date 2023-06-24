<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     */
    public function registration(Request $request) : Response
    {
        $parameters = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

         // Hash the 'password' parameter if it exists
        if (isset($parameters['password'])) {
            $parameters['password'] = Hash::make($parameters['password']);
        }
        $parameters['email_verified_at'] = Carbon::now();
        $user = User::create($parameters);
        
        return $this->successResponse(['status'=> true, 'data'=>$user], Response::HTTP_CREATED);
    }


    /**
     * Display a listing of the resource.
     */
    public function profileUpdate(Request $request, $user) 
    {
        $parameters = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required',
            
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);
        $user->fill($parameters);

        if($user->isClean()){
            return $this->errorResponse('At least one value need to be changed!', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user->save();

        return $this->successResponse(['status'=> 200,'message'=> 'Successfully Updated!'], 200);
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
            return $this->successResponse(['status'=> 200,'accessToken'=> $token], 200);
        }else{
            return $this->successResponse(['status'=> 201,'message'=> 'Credentials is not valid!'], 201);
        }
    }

    /**
     * Get User Information.
     */
    public function getuserInfo() : Response
    {
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return $this->successResponse(['status'=> 200,'data'=> $user], 200);
        }
        return $this->successResponse(['status'=> 401,'data'=> 'Unathenticated'], 401);
        
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

            return $this->successResponse(['status'=> 200,'message'=> 'Successfully logout!'], 200);
        }
        return $this->successResponse(['status'=> 401,'data'=> 'Unathenticated'], 401);
    }    
}
