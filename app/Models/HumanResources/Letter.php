<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Letter extends Model
{    
    protected $table = 'rrhh_letters';
    protected $fillable = ['client_id', 'employee_id', 'causal_id', 'certification', 'notice_date', 
    'settlement_date', 'fact', 'contract_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'notice_date', 'settlement_date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\HumanResources\Contract', 'contract_id');
    }

    // mutators
    public function setNoticeDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['notice_date'] = $date->format('Y-m-d');
    }

    public function setSettlementDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['settlement_date'] = $date->format('Y-m-d');
    }

    // funciones
    public function code()
    {
        return 'CA-'.$this->client_id.'-'.$this->id;
    }
}
