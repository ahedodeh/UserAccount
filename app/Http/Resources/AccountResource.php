<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
                'user_id' => $this->user_id,
                'company_name' => $this->company_name,
                'address' => $this->address,
                'region' => $this->region,
                'phone' => $this->phone,
                'mobile_prefix' => $this->mobile_prefix,
                'mobile' => $this->mobile,
                'language' => $this->language,
                'default_map' => $this->default_map,
                'time_zone' => $this->time_zone,
                'landing_page' => $this->landing_page,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at,
            ];
        
        }
}
