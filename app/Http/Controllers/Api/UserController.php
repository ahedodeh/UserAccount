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



class UserController extends Controller
{
    
    
    public function index(Request $request)
    {
    //     $filter = new UserQuery();
    //   $queryUser = $filter ->transform($request->all());
    //     if ($queryUser === null) {
    //         return new UserCollection(User::paginate(3));
    //     }else{
    //         return UserResource::collection(User::where($queryUser)->get());
    //     }
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
    public function show(User $user)
    {
        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->validateUnique($request);
        $user->update($request->all());
        $res = [
            'message' => 'Updated user successfully',
            'status' => 200,
            'data'=> new UserResource($user)
        ];
        return $res;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            $res = [
                'message'=> 'User Deleted successfully',
                'status'=> 200,
                'data'=> new UserResource($user)
            ];
            return $res;

        }
    }
}

