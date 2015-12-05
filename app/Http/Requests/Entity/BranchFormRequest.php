<?php 

namespace App\Http\Requests\Entity;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class BranchFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => 'required',            
            'name' => 'required',
            'address' => 'required',            
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
            'address.required'  => 'Favor ingresar la Dirección',
        ];
    }
    
}