<?php 

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ManagementFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',            
            'name' => 'required',
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
            'responsible_id.required'  => 'Favor seleccionar el Responsable',
        ];
    }
    
}