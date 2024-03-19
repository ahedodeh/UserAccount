<?php

namespace App\Http\Requests;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\UserTypeEnum;

class StoreUserRequest extends FormRequest
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
        return [
        'name'=>['required'],
        'email'=>['required','email','unique:users'],
        'password'=>['required'],
        'username' => ['required', 'unique:users'],
        'last_login'=>['nullable','date'],
        'user_type'=>['required', Rule::in(array_values(UserTypeEnum::MAP))],
        'allowable_users'=>['required'],
        'locked_at'=>['nullable','date'],
        'financial_number'=>['required'],
        'background_color'=>['required'],
        'last_login_at'=>['nullable','date'],
        'jwt_ttl' => ["nullable", 'integer'],
        'imei' => ['nullable', 'string' , 'unique:users'],
       
        ];
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
