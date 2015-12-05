<?php 

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class UnitFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',            
            'name' => 'required',
            'management_id' => 'required',            
            'responsible_id' => 'required',        
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required'  => 'Favor ingresar el Nombre',
            'management_id.required'  => 'Favor seleccionar la Gerencia',
            'responsible_id.required' => 'Favor seleccionar Responsable',            
        ];
    }
    
}