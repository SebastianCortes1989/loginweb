<?php 

namespace App\Http\Requests\HumanResources;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TransferEditFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cause_id' => 'required',
            'from_branch_id' => 'required',
            'to_branch_id' => 'required',
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
            'start_date.required'  => 'Favor ingresar Fecha de Inicio',
            'end_date.required'  => 'Favor ingresar Fecha de Término',
            'cause_id.required'  => 'Favor Seleccionar Causa',
            'from_branch_id.required'  => 'Favor Seleccionar Sucursal de Origen',
            'to_branch_id.required'  => 'Favor Seleccionar Sucursal Transferida',
        ];
    }
    
}