<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserInfoRequest extends FormRequest
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

    /**
     * Get the specific messages for errors.
     *
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            /*
            // User info
            'first_name.required'           => 'Ingrese Nombre(s) del usuario',
            'last_name.required'            => 'Ingrese Apellido(s) del usuario',
            'cell_phone_number.required'    => 'Ingrese el Teléfono Móvil del usario',
            'cell_phone_number.numeric'     => 'El valor debe ser numérico',
            // Address
            'street_address.required'       => 'Ingrese nombre de la Calle',
            'outdoor_number.required'       => 'Ingrese Número Exterior',
            'outdoor_number.numeric'        => 'El valor debe ser numérico',
            'colony.required'               => 'Ingrese nombre de la Colonia',
            'postal_code.required'          => 'Ingrese Código Postal',
            'postal_code.numeric'           => 'El valor debe ser numérico',
            'city.required'                 => 'Ingrese nombre del Municipio o Ciudad',
            'state.required'                => 'Ingrese nombre del Estado',
            'country.required'              => 'Ingrese nombre del País',
            */
        ];
    }
}
