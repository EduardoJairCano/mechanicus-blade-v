<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministratorRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            /* User info */
            'first_name'        => 'required',
            'last_name'         => 'required',
            'rfc'               => '',
            'cell_phone_number' => 'required|numeric',
            /* Address */
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
}
