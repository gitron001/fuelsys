<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TankRequest extends FormRequest
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
          'name'        => 'required',
          'product_id'  => 'required',
          'capacity'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'The name field is required !',
            'product_id.required'   => 'The product field is required !',
            'capacity.required'     => 'The capacity field is required !',
        ];
    }
}
