<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Services\UserQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $filter = new UserQuery();
        $queryItems = $filter ->transform($request);

        if ($queryItems === null) {
            return new UserCollection(User::paginate(2));
        }else{
            return UserResource::collection(User::where($queryItems)->get());
        }
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

        return $res;
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
    public function show($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $res = [
            'status' => 200,
            'data' => new UserResource($user)
            ];
            return $res;
        } catch (ModelNotFoundException $e) {
              $res = [
                'message' => 'User not found',
                'status' => 404,
            ];

            return $res;
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,$user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $this->validateUnique($request);
            $user->update($request->all());
            $res = [
                'message' => 'Updated user successfully',
                'status' => 200,
                'data' => new UserResource($user)
            ];
            return $res;
        } catch (ModelNotFoundException $e) {
             $res = [
                'message' => 'User not found',
                'status' => 404,
            ];
            return $res; 

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->delete();
            $res = [
                'message' => 'User Deleted successfully',
                'status' => 200,
                'data' => new UserResource($user)
            ];
            return $res;

        } catch (ModelNotFoundException $e) {
             $res = [
                'message' => 'User not found',
                'status' => 404,
            ];
            return $res; 
        }
    }
}

