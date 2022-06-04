<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;



class UsersController extends Controller
{
    /**
     * Sign-into An existing account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $request->validate([
            //'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            //'device_name' => 'required',
        ]);
 
        $user = User::where('email', $request->email)->first();

 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return Response()->json(["message" => "Something Went wrong"], 422);
        }

        return Response()->json([
          "token"=>$user->createToken($request->email)->plainTextToken,
          "email" => $user->email
          //"name" => $user->name
        ]);
    }




    /**
     * Creates a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {

            return response()->json(['message' => 'This email is alredy used'], 422);
        }


        $input['password'] = Hash::make($request['password']);
        $user = User::create([
          "name" => $request["name"],
          "email" => $request["email"],
          "password" => $input["password"],
        ]);
        $response['user'] = $user;

        return response(json_encode($response), 201);
    }


    /**
     * Signs-out the user by deleting the current token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $request->user()->currentAccessToken()->delete();
        return Response()->json(["message" => "whoever throw that paper ur moms a hoe"]);
    }

    public function get(Request $request){
        return User::all();
    }




}
