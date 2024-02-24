<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'emailVerifiedAt' => $this->email_verified_at,
            'password' => $this->password,
            'rememberToken' => $this->remember_token,
            'Username' => $this->thisname,
            'lastLogin' => $this->last_login,
            'UserType' => $this->this_type,
            'allowableUsers' => $this->allowable_thiss,
            'locked_at' => $this->locked_at,
            'financial_number' => $this->financial_number,
            'background_color' => $this->background_color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'last_login_at' => $this->last_login_at,
            'deleted_at' => $this->deleted_at,
            'jwt_ttl' => $this->jwt_ttl,
            'imei' => $this->imei,
        ];
    }
}
