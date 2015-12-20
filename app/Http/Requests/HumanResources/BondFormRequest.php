<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class BondFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'type_id' => 'required',
            'ammount' => 'required',
            'date' => 'required',
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
            'type_id.required'  => 'Favor Seleccionar el Tipo de Bono',
            'ammount.required'  => 'Favor ingresar Monto',
            'date.required'  => 'Favor ingresar Fecha',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}