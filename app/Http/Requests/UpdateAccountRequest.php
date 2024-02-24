<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateAccountRequest extends FormRequest
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
            'name' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'company_name' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'region' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'mobile_prefix' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'language' => ['required', Rule::in(['arabic', 'english'])],
            'default_map' => ['required', Rule::in(['pits-map', 'bing-default', 'google-default'])],
            'time_zone' => ['required', 'string'],
            'landing_page' => ['required', 'string'],
               
            ];
        }else{
            return [

            'name' => ['sometimes','required'],
            'user_id' => ['sometimes','required', 'exists:users,id'],
            'company_name' => ['sometimes','nullable', 'string'],
            'address' => ['sometimes','nullable', 'string'],
            'region' => ['sometimes','nullable', 'string'],
            'phone' => ['sometimes','nullable', 'string'],
            'mobile_prefix' => ['sometimes','required', 'string'],
            'mobile' => ['sometimes','required', 'string'],
            'language' => ['sometimes','required', Rule::in(['arabic', 'english'])],
            'default_map' => ['sometimes','required', Rule::in(['pits-map', 'bing-default', 'google-default'])],
            'time_zone' => ['sometimes','required', 'string'],
            'landing_page' => ['sometimes','required', 'string'],
                
                ];
        }
    }
}
