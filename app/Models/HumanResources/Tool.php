<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table = 'rrhh_tools';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'description', 'contract_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
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
        return 'HE-'.$this->client_id.'-'.$this->id;
    }
}
