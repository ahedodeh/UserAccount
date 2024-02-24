<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Account;

class AccountCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
 public function toArray(Request $request): array
{
    return [
        'data' => $this->map(function ($account)  {
            return [
                'id' => $account->id,
                'name' => $account->name,
                'user_id' => $account->user_id,
                'company_name' => $account->company_name,
                'address' => $account->address,
                'region' => $account->region,
                'phone' => $account->phone,
                'mobile_prefix' => $account->mobile_prefix,
                'mobile' => $account->mobile,
                'language' => $account->language,
                'default_map' => $account->default_map,
              
            ];
        }),
    ];
}

}
