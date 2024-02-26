<?php
namespace App\Services;

use Illuminate\Http\Request;

class UserQuery {

/*
 $table->string('name');
            $table->string('email')->unique();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->string('username')->unique();
            $table->timestamp('last_login')->nullable();
            $table->enum('user_type',['Tracking','personal','pitsonal']);
            $table->integer('allowable_users')->nullable();
            $table->timestamp('locked_at')->nullable();
            $table->string('financial_number')->nullable();
            $table->string('background_color')->nullable();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();
            $table->softDeletes()->nullable();
            $table->integer('jwt_ttl')->default(480);
            $table->string('imei')->unique()->nullable();
*/

    protected $param =[
        'email'=> ['eq'],
        'password'=> [],


    ];
    public function transform(Request $request){

    }
}