<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveServiceRequest extends FormRequest
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
            'ID_SERVICE' => 'integer|exists:services,ID_SERVICE',
            'SERVICE_NAME' => 'required|max:25',
            'ESTIMATED_PRICE' => 'required|integer|max:99999999',
            'ESTIMATED_DURATION' => 'required|integer|max:3600',
            'SERVICE_COLOR' => 'required|max:6',
            'SERVICE_DESCRIPTION' => 'required|max:255'
        ];
    }
}
