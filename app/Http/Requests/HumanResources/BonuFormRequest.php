<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class BonuFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'type' => 'required',
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
            'type.required'  => 'Favor Seleccionar el Tipo de Aguinaldo',
            'ammount.required'  => 'Favor ingresar Monto',
            'date.required'  => 'Favor ingresar Fecha',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}