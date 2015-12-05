<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ExtraHourFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'employee_id.required'  => 'Favor Seleccionar el Trabajador',
            'type.required'  => 'Favor ingresar Tipo de Hora Extra',
            'start_date.required'  => 'Favor ingresar Fecha de Inicio',
            'end_date.required'  => 'Favor ingresar Fechade Término',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}