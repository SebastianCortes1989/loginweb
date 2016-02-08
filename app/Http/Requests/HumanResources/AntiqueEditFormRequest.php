<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class AntiqueEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
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
            'date.required'  => 'Favor ingresar Fecha de Emisión',
        ];
    }
    
}