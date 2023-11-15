<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    public function index(){
        return User::with('role')->paginate();
    }

    public function show($id){
        $user = User::find($id);
        return new UserResource($user);
    }

    public function store(UserCreateRequest $request){
        
        $user = User::create(
            $request->only('first_name', 'last_name', 'email', 'role_id')
            + ['password' => Hash::make(1234)]
        );
        return response($user, Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, $id){
        
        $user = User::find($id);

        $user->update($request->only('first_name', 'last_name', 'email', 'role_id'));

        return response($user, Response::HTTP_ACCEPTED);
    }


    public function destroy($id){
        
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function user()
    {
        return \Auth::user();
    }


    public function updateInfo(Request $request)
    {
        $user = \Auth::user();

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response($user, Response::HTTP_ACCEPTED);
    }

    public function updatePassword(Request $request)
    {
        $user = \Auth::user();

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return response($user, Response::HTTP_ACCEPTED);
    }
}
