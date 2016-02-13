<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class LetterEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'notice_date' => 'required',
            'settlement_date' => 'required',
            'causal_id' => 'required',
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
            'notice_date.required'  => 'Favor ingresar Fecha de Notificación',
            'settlement_date.required'  => 'Favor ingresar Fecha de Finiquitación',
            'causal_id.required'  => 'Favor Seleccionar Causal',
        ];
    }
    
}