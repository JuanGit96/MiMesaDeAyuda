<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
        $rules = [
            'typeCase' => 'required',
            'priority' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'technical_id' => 'required',
        ];

        if(!auth()->user()->isClient())
            $rules["client_id"] = "required";

        return $rules;
    }

    public function messages()
    {
        return [
            'typeCase.required' => 'el campo tipo de caso es obligatorio',
            'priority.required' => 'el campo prioridad es obligatorio',
            'address.required' => 'el campo direccion es obligatorio',
            'latitude.required' => 'el campo latitud es obligatorio',
            'longitude.required' => 'el campo longitud es obligatorio',
            'description.required' => 'El campo descripcion es obligatorio',
            'technical_id.required' => 'el campo tecnico es obligatorio',
            'client_id.required' => 'Elcampo cliente es obligatorio',
        ];
    }
}
