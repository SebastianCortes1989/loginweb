<?php 

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class EmployeeFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'rut' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'nationality_id' => 'required',
            'city_id' => 'required',
            'commune_id' => 'required',
            'passport' => 'required',
            'type_id' => 'required',
            'afc_id' => 'required',
            'afp_id' => 'required',
            'apv_id' => 'required',
            'bank_id' => 'required',
            'account_type_id' => 'required',
            'account_number' => 'required',
            'health_id' => 'required',
            'ges' => 'required',
            'plan_value' => 'required',
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
            'address.required'  => 'Favor ingresar la Dirección',
            'region_id.required'  => 'Favor seleccionar la Región',
            'city_id.required'  => 'Favor seleccionar la Ciudad',
            'phone.required'  => 'Favor ingresar el Teléfono',
            'email.required'  => 'Favor ingresar el E-mail',            
        ];
    }
    
}