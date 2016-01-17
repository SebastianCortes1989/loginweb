<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class LoanFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'type_id' => 'required',
            'ammount' => 'required',
            'quotas' => 'required',
            'grant_date' => 'required',
            'day' => 'required',
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
            'grant_date.required'  => 'Favor ingresar Fecha de Otorgamiento',
            'day.required'  => 'Favor Seleccionar Día',
            'month.required'  => 'Favor Seleccionar Mes',
            'year.required'  => 'Favor Seleccionar Año',
        ];
    }
    
}