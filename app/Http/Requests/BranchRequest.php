<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
          'name'    => 'required',
          'address' => 'required',
          'city'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'The name field is required !',
            'address.required'  => 'The address code field is required !',
            'city.required'     => 'The city code field is required !',
        ];
    }
}
