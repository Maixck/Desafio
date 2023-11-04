<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserController extends Controller
{

    public function getApiToken(Request $request){
        $user = User::where('email',$request->input('email'))->first();
        if (Hash::check($request->input('password'), $user->password)) {
            $token = $user->createToken($request->input('token_name'));
            return response()->json([
                'token' => [
                    'plainTextToken'    => $token->plainTextToken,
                    'name'              => $token->accessToken->name],
                'user' => $user,
            ]);
        }else{
            dd('fail');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
