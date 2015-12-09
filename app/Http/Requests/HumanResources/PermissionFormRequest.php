<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class PermissionFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'year' => 'required',
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
            'start_date.required'   => 'Favor ingresar Fecha de Inicio',
            'end_date.required'     => 'Favor ingresar Fecha de Término',
            'type.required'         => 'Favor ingresar Tipo',
            'year.required'         => 'Favor ingresar Año',
        ];
    }
    
}