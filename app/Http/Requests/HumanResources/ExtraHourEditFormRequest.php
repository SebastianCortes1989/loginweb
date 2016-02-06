<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ExtraHourEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'percentaje' => 'required',
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
            'type.required'         => 'Favor ingresar Porcentaje',
            'start_date.required'   => 'Favor ingresar Fecha de Inicio',
            'end_date.required'     => 'Favor ingresar Fechade Término',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}