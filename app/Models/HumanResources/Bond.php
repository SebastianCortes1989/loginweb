<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{    
    protected $table = 'rrhh_bonds';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'type_id', 'description', 'contract_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\HumanResources\BondType', 'type_id');
    }    

    //mutators
    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date'] = $date->format('Y-m-d');
    }

    //functions
    public function code()
    {
        return 'BON-'.$this->client_id.'-'.$this->id;
    }
}
