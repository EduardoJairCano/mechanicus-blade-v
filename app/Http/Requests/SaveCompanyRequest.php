<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            // Customer
            'customer_id'       => 'required',
            // Company
            'name'              => 'required',
            // Address
            'street_address'    => 'required',
            'outdoor_number'    => 'required|numeric',
            'interior_number'   => '',
            'colony'            => 'required',
            'postal_code'       => 'required|numeric',
            'city'              => 'required',
            'state'             => 'required',
            'country'           => 'required',
            'phone_number'      => '',
            'fax_number'        => '',
        ];
    }

    /**
     * Get the specific messages for errors.
     *
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            // Customer
            'customer_id.required'      => 'Seleccione un cliente.',
            // Company
            'name.required'             => 'El campo nombre de compañia es obligatorio.'
        ];
    }
}
