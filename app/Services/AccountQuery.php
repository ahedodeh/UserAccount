<?php

// Adding if the param & operation are not exist

namespace App\Services;

use Illuminate\Http\Request;

class AccountQuery
{
    protected $safeParams = [
        'name' => ['eq'],
        'user_id' => ['eq'],
        'company_name' => ['eq'],
        'language' => ['eq'],
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

    


