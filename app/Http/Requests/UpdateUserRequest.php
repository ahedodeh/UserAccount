<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method= $this->method();
        if ($method == "PUT") {

            return [
                
        'name'=>['required'],
        'email'=>['required','email'],
        'password'=>['required'],
        'username'=>['required'],
        'last_login'=>['nullable','date'],
        'user_type'=>['required', Rule::in(['Tracking','personal','pitsonal'])],//
        //add validation here 
        'allowable_users'=>['required'],
        'locked_at'=>['nullable','date'],
        'financial_number'=>['required'],
        'background_color'=>['required'],
        'last_login_at'=>['nullable','date'],
        'jwt_ttl' => ["nullable", 'integer'],
        'imei' => ['nullable', 'string'],
       
        
            ];
        }else{
            return [
        'name'=>['sometimes','required'],
        'email'=>['sometimes','required','email'],
        'password'=>['sometimes','required'],
        'username'=>['sometimes','required'],
        'last_login'=>['sometimes','nullable','date'],
        'user_type'=>['sometimes','required', Rule::in(['Tracking','personal','pitsonal'])],
        'allowable_users'=>['sometimes','required'],
        'locked_at'=>['sometimes','nullable','date'],
        'financial_number'=>['sometimes','required'],
        'background_color'=>['sometimes','required'],
        'last_login_at'=>['sometimes','nullable','date'],
        'jwt_ttl' => ['sometimes',"nullable", 'integer'],
        'imei' => ['sometimes','nullable', 'string'],
       
        ];
        }
    }
}
