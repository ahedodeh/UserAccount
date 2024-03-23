<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\UserRoleEnum;

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
        'email'=>['required','email','unique:users'],
        'password'=>['required'],
        'username'=>['required','unique:users'],
        'last_login'=>['nullable','date'],
        'user_type'=>['required', Rule::in(['Tracking','personal','pitsonal'])],
        'allowable_users'=>['required'],
        'locked_at'=>['nullable','date'],
        'financial_number'=>['required'],
        'background_color'=>['required'],
        'last_login_at'=>['nullable','date'],
        'jwt_ttl' => ["nullable", 'integer'],
        'imei' => ['nullable', 'string','unique:users'],
        'role' => ['sometimes', Rule::in(array_values(UserRoleEnum::MAP))],

       
        
            ];
        }else{
            return [
        'name'=>['sometimes','required'],
        'email'=>['sometimes','required','email','unique:users'],
        'password'=>['sometimes','required'],
        'username'=>['sometimes','required','unique:users'],
        'last_login'=>['sometimes','nullable','date'],
        'user_type'=>['sometimes','required', Rule::in(['Tracking','personal','pitsonal'])],
        'allowable_users'=>['sometimes','required'],
        'locked_at'=>['sometimes','nullable','date'],
        'financial_number'=>['sometimes','required'],
        'background_color'=>['sometimes','required'],
        'last_login_at'=>['sometimes','nullable','date'],
        'jwt_ttl' => ['sometimes',"nullable", 'integer'],
        'imei' => ['sometimes','nullable', 'string','unique:users'],
        'role' => ['sometimes', Rule::in(array_values(UserRoleEnum::MAP))],

       
        ];
        }

        
    }
        public function messages()
    {
        return [
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.',
            'imei.unique' => 'The IMEI has already been taken.',
        ];
    }
}
