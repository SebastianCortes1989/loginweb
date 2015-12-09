<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class LicensingFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'ammount' => 'required',
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
            'ammount.required'      => 'Favor ingresar Monto',
        ];
    }
    
}