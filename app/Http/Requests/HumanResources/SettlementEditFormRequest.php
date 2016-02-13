<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class SettlementEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'causal_id' => 'required',
            'date' => 'required',
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
            'causal_id.required'  => 'Favor Seleccionar Causal',
            'date.required'  => 'Favor ingresar Fecha de Emisión',
        ];
    }
    
}