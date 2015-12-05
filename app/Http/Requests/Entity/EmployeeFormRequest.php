<?php 

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class EmployeeFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',
            'rut' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'nationality_id' => 'required',
            'city_id' => 'required',
            'commune_id' => 'required',
            'type_id' => 'required',
            'afc_id' => 'required',
            'afp_id' => 'required',
            'apv_id' => 'required',
            'bank_id' => 'required',
            'account_type_id' => 'required',
            'health_id' => 'required',
            'ges' => 'required',
            'family_charge' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'rut.required' => 'Favor ingresar el RUT',
            'name.required'  => 'Favor ingresar el Nombre',
            'birthday.required'  => 'Favor ingresar Fecha de Nacimiento',
            'address.required' => 'Favor ingresar Dirección',
            'phone.required' => 'Favor ingresar Télefono',
            'nationality_id.required' => 'Favor seleccionar Nacionalidad',
            'city_id.required' => 'Favor seleccionar Ciudad',
            'commune_id.required' => 'Favor seleccionar Comuna',
            'type_id.required' => 'Favor seleccionar Tipo de Trabajador',
            'afc_id.required' => 'Favor seleccionar AFC',
            'afp_id.required' => 'Favor seleccionar AFP',
            'apv_id.required' => 'Favor seleccionar APV',
            'bank_id.required' => 'Favor seleccionar Banco',
            'account_type_id.required' => 'Favor seleccionar Tipo de Cuenta',
            'health_id.required' => 'Favor seleccionar Salud',
            'ges.required' => 'Favor ingresar GES',
            'family_charge.required' => 'Favor seleccionar Cargas',
        ];
    }
    
}