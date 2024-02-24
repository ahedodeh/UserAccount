<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;



class UserController extends Controller
{
    
    
    public function index()
    {
        return new UserCollection(User::paginate(3));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->validateUnique($request);
        $user = User::create($request->all());

        $res = [
            'message' => 'User created successfully',
            'status' => 200,
            'data' => new UserResource($user)
        ];

        return response()->json($res);
    }

    private function validateUnique(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
            'imei' => 'unique:users',
        ], [
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.',
            'imei.unique' => 'The IMEI has already been taken.',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $account)
    {
        //
    }
}

