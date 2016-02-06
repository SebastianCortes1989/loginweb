<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class LicensingEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'number' => 'required',
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
            'number.required'      => 'Favor ingresar Número',
        ];
    }
    
}