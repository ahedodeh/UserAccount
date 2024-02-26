<?php

// Adding if the param & operation are not exist

namespace App\Services;

use Illuminate\Http\Request;

class AccountQuery
{
    protected $safeParams = [
        'name' => '=',
        'user_id' => '=',
        'company_name' => '=',
        'language' => '=',
    ];
    // protected $operatorMap = [
    //     'eq' => '=',
    //     'gt' => '>',
    //     'lt' => '<'
    // ];


    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operation) {
            if ($request->has($param)) {
                $queryValue = $request->input($param);

                $eloQuery[] = [$param, $operation, $queryValue];

            }
        }

        return $eloQuery;
    }
}

    



