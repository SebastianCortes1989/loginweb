<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_contracts';
    protected $fillable = ['client_id', 'employee_id', 'branch_id', 'charge_id', 
    'contract_type_id', 'working_type', 'start_date', 'end_date'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'start_date', 'end_date'];

    /*
     * relaciones
   	*/
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function contractType()
    {
        return $this->belongsTo('App\Models\Admin\ContractType', 'contract_type_id');
    }

    public function charge()
    {
        return $this->belongsTo('App\Models\Entity\Charge', 'charge_id');
    }

    public function bonds()
    {
        return $this->hasMany('App\Models\HumanResources\Bond', 'contract_id');
    }

    public function commissions()
    {
        return $this->hasMany('App\Models\HumanResources\Commission', 'contract_id');
    }

    public function tools()
    {
        return $this->hasMany('App\Models\HumanResources\Tool', 'contract_id');
    }

    public function viaticals()
    {
        return $this->hasMany('App\Models\HumanResources\Viatical', 'contract_id');
    }

    public function bonus()
    {
        return $this->hasMany('App\Models\HumanResources\Bonus', 'contract_id');
    }

    public function advances()
    {
        return $this->hasMany('App\Models\HumanResources\Advance', 'contract_id');
    }

    public function discounts()
    {
        return $this->hasMany('App\Models\HumanResources\Discount', 'contract_id');
    }

    public function savings()
    {
        return $this->hasMany('App\Models\HumanResources\Saving', 'contract_id');
    }

    public function extraHours()
    {
        return $this->hasMany('App\Models\HumanResources\ExtraHour', 'contract_id');
    }

    //mutators
    public function setStartDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['start_date'] = $date->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['end_date'] = $date->format('Y-m-d');
    }

    //funciones
    public function code()
    {
        return 'CONT-'.$this->client_id.'-'.$this->id;
    }

    public function totalBonds()
    {
        return $this->bonds()->sum('ammount');
    }

    public function totalCommissions()
    {
        return $this->commissions()->sum('ammount');
    }

    public function totalTools()
    {
        return $this->tools()->sum('ammount');
    }

    public function totalViaticals()
    {
        return $this->viaticals()->sum('ammount');
    }

    public function totalBonus()
    {
        return $this->bonus()->sum('ammount');
    }

    public function totalAdvances()
    {
        return $this->advances()->sum('ammount');
    }

    public function totalDiscounts()
    {
        return $this->discounts()->sum('ammount');
    }

    public function totalSavings()
    {
        return $this->savings()->sum('ammount');
    }

    public function totalExtraHours()
    {
        $hours = $this->extraHours()->sum('hours');

        return $hours;
    }


    public function addRemuneration($data)
    {
        $this->base         = $data['base'];
        $this->liquid       = $data['liquid'];
        $this->collation    = $data['collation'];
        $this->mobilization = $data['mobilization'];
        $this->tools        = $data['tools'];
        $this->save();

        return $this;
    }
}
