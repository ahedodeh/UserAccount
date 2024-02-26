<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountCollection;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\BulkStoreAccountRequest;
use Illuminate\Http\Request;
use App\Services\AccountQuery;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AccountQuery();
        $queryItems = $filter->transform($request); //[['column','operation','value']

        if ($queryItems === null) {
            return new AccountCollection(Account::paginate(2));
        }else{
            return AccountResource::collection(Account::where($queryItems)->get());
        }
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());

        $res = [
            'message' => 'Account created successfully',
            'status' => 200,
            'data' => new AccountResource($account)
        ];

        return $res;
    }

    public function bulkStore(BulkStoreAccountRequest $request){
        $account = collect($request->all());
        Account::insert($account->toArray());
        $res = [
            'message' => 'Bulk process inserted successfully',
            'status' => 200,
        ];
        return $res;
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return new AccountResource($account);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
{
    $account->update($request->all());

    $res = [
        'message' => 'Updated account successfully',
        'status' => 200,
        'data'=> new AccountResource($account)
    ];

    return $res;
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {

        if ($account) {
            $account->delete();
            $res = [
                'message' => 'Account Deleted successfully',
                'status' => 200,
                'data' => new AccountResource($account)
            ];
            return $res;

        }
    }
}
