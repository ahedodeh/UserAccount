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
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function bulkStore(BulkStoreAccountRequest $request)
    {
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
    public function show($account_id)
    {
        try {
            $account = Account::findOrFail($account_id);
            $res = [
            'status' => 200,
            'data' => new AccountResource($account)
            ];
            return $res;
        } catch (ModelNotFoundException $e) {
            $res = [
                'message' => 'Account not found',
                'status' => 404,
            ];

            return $res;
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request,$account_id)
    {
        try {
            $account = Account::findOrFail($account_id);
            $account->update($request->all());

            $res = [
                'message' => 'Updated account successfully',
                'status' => 200,
                'data' => new AccountResource($account)
            ];

            return $res;
        } catch (ModelNotFoundException $e) {
            $res = [
                'message' => 'Account not found',
                'status' => 404,
            ];

            return $res;
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($account_id)
    {
        try {
            $account = Account::findOrFail($account_id);

            Account::destroy($account_id);

            $res = [
                'message' => 'Account Deleted successfully',
                'status' => 200,
                'data' =>  AccountResource::make($account),
            ];

            return $res;
        } catch (ModelNotFoundException $e) {
            $res = [
                'message' => 'Account not found',
                'status' => 404,
            ];

            return $res;
        }
    }


}
