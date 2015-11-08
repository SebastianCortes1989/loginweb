<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_employees';
    protected $fillable = ['rut', 'client_id', 'name', 'birthday', 'address', 'phone', 'movil_phone', 'nacionality_id', 'city_id', 'commune_id', 'passport', 'type_id', 'afc_id', 'afp_id', 'apv_id', 'bank_id', 'account_type_id', 'account_number', 'health_id', 'ges', 'plan_value', 'family_charge_id', 'maternals', 'invalids', 'familiars'];

    /*
     * relaciones
   	*/
    public function afp()
    {
        return $this->belongsTo('App\Models\Admin\Afp', 'afp_id');
    }

    public function nacionality()
    {
        return $this->belongsTo('App\Models\Admin\Nacionality', 'nacionality_id');
    }

    public function health()
    {
        return $this->belongsTo('App\Models\Admin\Health', 'health_id');
    }
}
