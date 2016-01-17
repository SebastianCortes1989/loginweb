<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class CcafFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'type_id' => 'required',
            'ammount' => 'required',
            'quotas' => 'required',
            'compensacion_id' => 'required',
            'month' => 'required',
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
            'type.required'  => 'Favor Seleccionar el Tipo de Anticipo',
            'ammount.required'  => 'Favor ingresar Monto',
            'quotas.required'  => 'Favor ingresar Cuotas',
            'compensacion_id.required'  => 'Favor Seleccionar Caja de Compensación',
            'month.required'  => 'Favor Seleccionar Mes',
            'year.required'  => 'Favor Seleccionar Año',
        ];
    }
    
}