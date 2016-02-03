<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ToolEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
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
            'ammount.required'  => 'Favor ingresar Monto',
            'date.required'  => 'Favor ingresar Fecha',
            'description.required'  => 'Favor ingresar Descripción',
        ];
    }
    
}