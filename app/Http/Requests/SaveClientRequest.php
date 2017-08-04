<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveClientRequest extends FormRequest
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
            'id' => 'integer|exists:clients,id',
            'firstName' => 'required|min:3|max:15',
            'lastName' => 'required|min:2|max:15',
            'email' => 'required|email',
            'phoneNumber' => 'required|min:8',
            'gender' => 'required|max:1',
            'birthday' => 'required|date'
        ];
    }
}
