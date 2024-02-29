<?php

namespace App\Http\Requests;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        'email'=>['required','email'],
        'password'=>['required'],
        'username'=>['required'],
        'last_login'=>['nullable','date'],
        'user_type'=>['required', Rule::in(['Tracking','personal','pitsonal'])],//file
        'allowable_users'=>['required'],
        'locked_at'=>['nullable','date'],
        'financial_number'=>['required'],
        'background_color'=>['required'],
        'last_login_at'=>['nullable','date'],
        'jwt_ttl' => ["nullable", 'integer'],
        'imei' => ['nullable', 'string'],
       
        ];
    }

    
}
