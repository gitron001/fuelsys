<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'price'       => 'required',
          'pfc_id'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'price.required'    => 'The price field is required !',
            'pfc_id.required'   => 'The pfc field is required !',
            'capacity.required' => 'The capacity field is required !',
        ];
    }
}
