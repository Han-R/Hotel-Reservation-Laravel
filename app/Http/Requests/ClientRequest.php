<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "password" => "required",
            "phone"    => "required",
            "address"    => "required",
            "no_of_adults"    => "required",
            "no_of_children"    => "required",
            "email" => "required|email|unique:clients,email,".request()->segment(3)
        ];
    }
}
