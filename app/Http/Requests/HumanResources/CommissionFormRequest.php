<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class CommissionFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'ammount' => 'required',
            'date' => 'required',
            'type_id' => 'required',
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
            'ammount.required'  => 'Favor ingresar Monto',
            'date.required'  => 'Favor ingresar Fecha',
            'type_id.required'  => 'Favor ingresar Tipo de Comisión',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}