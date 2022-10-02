<?php

namespace App\Http\Requests\AdvertisingController;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'  => 'required|string|min:5|max:250',
            'from'  => 'required|date|date_format:Y-m-d',
            'to'    => 'required|date|after:from|date_format:Y-m-d',
            'total' => 'required|numeric|between:0,99999.99',
        ];
    }
}
