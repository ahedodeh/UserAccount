<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserQuery
{
    protected $safeParams = [
        'name'=>['eq'],
        'email' => ['eq'],
        'password' => ['eq'],
        'user_type' => ['eq'],
        'allowable_users' => ['eq', 'gt', 'lt'],
        'background_color' => ['eq'],
    ];

  protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<'
    ];
    public function transform(Request $request)
    {
        $eloQuery = [];
          foreach ($this->safeParams as $param => $operation) {
            $query = $request->query($param);
            if ($request->has($param)) {
                $queryValue = $request->input($param);

                foreach ($operation as $op) {
                    if(isset($query[$op]))
                    $eloQuery[] = [$param, $this->operatorMap[$op], $queryValue];
                }
            }
        }
        return $eloQuery;
    }
}