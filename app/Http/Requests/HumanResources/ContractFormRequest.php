<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ContractFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'employee_id' => 'required',
            'contract_type' => 'required',
            'charge_id' => 'required',
            'branch_id' => 'required',
            'working_type' => 'required',
            'start_date' => 'required',
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
            'contract_type.required'  => 'Favor Seleccionar el Tipo de  Contrato',
            'branch_id.required'  => 'Favor Seleccionar Sucursal',
            'working_type.required'  => 'Favor Seleccionar Tipo de Jornada',
            'charge_id.required'  => 'Favor Seleccionar el Cargo',
            'start_date.required'  => 'Favor ingresar Fecha de Inicio',
        ];
    }
    
}