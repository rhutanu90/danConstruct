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
            'SERVICE_NAME' => 'required',
            'ESTIMATED_PRICE' => 'required',
            'ESTIMATED_DURATION' => 'integer',
            'SERVICE_COLOR' => 'required',
            'SERVICE_DESCRIPTION' => 'required'
        ];
    }
}
