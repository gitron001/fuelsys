<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
          'fis_number'  => 'required',
          'bis_number'  => 'required',
          'tax_number'  => 'required',
          'res_number'  => 'required',
          'tel_number'  => 'required',
          'email'       => 'required',
          'address'     => 'required',
          'city'        => 'required',
          'country'     => 'required',
          'type'        => 'required',
          'status'      => 'required',
          'limit'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'The name field is required !',
            'fis_number.required'   => 'The fis number field is required !',
            'bis_number.required'   => 'The bis number field is required !',
            'tax_number.required'   => 'The tax number field is required !',
            'res_number.required'   => 'The res number field is required !',
            'tel_number.required'   => 'The tel number field is required !',
            'email.required'        => 'The email field is required !',
            'address.required'      => 'The address field is required !',
            'city.required'         => 'The city field is required !',
            'country.required'      => 'The country field is required !',
            'type.required'         => 'The type field is required !',
            'status.required'       => 'The status field is required !',
            'limit.required'        => 'The limit field is required !',
        ];
    }
}
