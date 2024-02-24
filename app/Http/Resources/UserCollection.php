<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {


         return [
            'data' => $this->map(function ($user) {
                return [
                   'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => $user->email_verified_at,
                    'password' => $user->password,
                    'username' => $user->username,
                    'last_login' => $user->last_login,
                    'user_type' => $user->user_type,
                    'allowable_users' => $user->allowable_users,
                    'locked_at' => $user->locked_at,
                    'financial_number' => $user->financial_number,
                    'background_color' => $user->background_color,
                    'jwt_ttl' => $user->jwt_ttl,
                    'imei' => $user->imei,
                ];
            })
        ];

    }
}
