<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveVehicleRequest extends FormRequest
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
            // Customer
            'customer_id'       => 'required',
            // Vehicle
            'plate'             => 'required',
            'serial_number'     => '',
            'make'              => 'required',
            'model'             => 'required',
            'year'              => 'required',
            'engine'            => 'required',
            'cylinder_count'    => 'required|gt:0',
            'transmission'      => 'required',
            'drivetrain'        => '',
            'fuel'              => 'required',
            'color'             => '',
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
            // Vehicle
            'transmission.required'     => 'Seleccione un tipo de transmisión.',
            'cylinder_count.required'   => 'Seleccione un número de cilindros.',
            'fuel.required'             => 'Seleccione un tipo de combustible.',
        ];
    }
}
