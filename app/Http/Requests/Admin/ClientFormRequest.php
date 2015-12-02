<?php 

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ClientFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'rut' => 'required',
            'name' => 'required',
            'social_reason' => 'required',
            'gyre' => 'required',
            'address' => 'required',
            'region_id' => 'required',
            'city_id' => 'required',
            'commune_id' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required',
            'name_representative' => 'required',
            'rut_representative' => 'required',
            'insurance_id' => 'required',
            'complementary' => 'required',
            'compensacion' => 'required',
            'mideplan' => 'required',
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
            'social_reason.required'  => 'Favor ingresar la Razón Social',
            'gyre.required'  => 'Favor ingresar el Giro',
            'address.required'  => 'Favor ingresar la Dirección',
            'region_id.required'  => 'Favor seleccionar la Región',
            'city_id.required'  => 'Favor seleccionar la Ciudad',
            'phone.required'  => 'Favor ingresar el Teléfono',
            'password.required'  => 'Favor ingresar la Clave',
            'email.required'  => 'Favor ingresar el E-mail',
            'rut_representative.required'  => 'Favor ingresar el RUT del Representante',
            'name_representative.required'  => 'Favor ingresar el Nombre del Representante',
            'insurance_id.required'  => '',
            'complementary.required'  => 'Favor seleccionar el Seguro Complementario',
            'compensacion.required'  => 'Favor seleccionar Caja de Compensación',
            'mideplan.required'  => 'Favor ingresar N° de Registro',
        ];
    }
    
}