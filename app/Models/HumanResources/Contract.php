<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{    
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

    public function permissions()
    {
        return $this->hasMany('App\Models\HumanResources\Permission', 'contract_id');
    }

    public function licensings()
    {
        return $this->hasMany('App\Models\HumanResources\Licensing', 'contract_id');
    }

    public function loanQuotas()
    {
        return $this->hasMany('App\Models\HumanResources\LoanQuota', 'contract_id');
    }

    public function ccafQuotas()
    {
        return $this->hasMany('App\Models\HumanResources\CcafQuota', 'contract_id');
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

    // functions
    public function code()
    {
        return 'CONT-'.$this->client_id.'-'.$this->id;
    }

    public function totalBonds($month, $year)
    {
        return $this->bonds()->month($month)->year($year)->sum('ammount');
    }

    public function totalCommissions($month, $year)
    {
        return $this->commissions()->month($month)->year($year)->sum('ammount');
    }

    public function totalTools($month, $year)
    {
        return $this->tools()->month($month)->year($year)->sum('ammount');
    }

    public function totalViaticals($month, $year)
    {
        return $this->viaticals()->month($month)->year($year)->sum('ammount');
    }

    public function totalBonus($month, $year)
    {
        return $this->bonus()->month($month)->year($year)->sum('ammount');
    }

    public function totalAdvances($month, $year)
    {
        return $this->advances()->month($month)->year($year)->sum('ammount');
    }

    public function totalDiscounts($month, $year)
    {
        return $this->discounts()->month($month)->year($year)->sum('ammount');
    }

    public function totalSavings($month, $year)
    {
        return $this->savings()->month($month)->year($year)->sum('ammount');
    }

    public function totalExtraHours($month, $year)
    {
        $hours = $this->extraHours()->month($month)->year($year)->sum('hours');
        $minutes = $this->extraHours()->month($month)->year($year)->sum('minutes');

        return $hours. '.' .$minutes;
    }

    public function totalNotWorkedDays($month, $year)
    {
        $licensings = $this->licensings()->month($month)->year($year)->sum('days');
        $permissions = $this->permissions()->month($month)->year($year)->sum('days');

        return $licensings+$permissions;
    }

    public function totalLoanQuotas($month, $year)
    {
        return $this->loanQuotas()->month($month)->year($year)->sum('ammount');
    }

    public function totalCcafQuotas($month, $year)
    {
        return $this->ccafQuotas()->month($month)->year($year)->sum('ammount');
    }


    public function totalAssets($month, $year)
    {
        $commissions = $this->totalCommissions($month, $year);
        $bonds = $this->totalBonds($month, $year);
        $extraHours = $this->totalExtraHours($month, $year);
        $collation = $this->collation;
        $mobilization = $this->mobilization;
        $tools = $this->totalTools($month, $year);
        $viaticals = $this->totalViaticals($month, $year);

        $total = $commissions+$bonds+$extraHours+$collation+$mobilization+$tools+$viaticals;

        return $total;
    }

    public function totalRemunerationDiscounts($month, $year)
    {
        $discounts = $this->totalDiscounts($month, $year);
        $bonus = $this->totalBonus($month, $year);
        $loanQuotas = $this->totalLoanQuotas($month, $year);
        $ccafQuotas = $this->totalCcafQuotas($month, $year);
        $savings = $this->totalSavings($month, $year);
        $advances = $this->totalAdvances($month, $year);
                    
        $total = $discounts+$bonus+$loanQuotas+$ccafQuotas+$savings+$advances;

        return $total;
    }

    public function totalLiquid($month, $year)
    {
        $assets = $this->totalAssets($month, $year);
        $discounts = $this->totalRemunerationDiscounts($month, $year);

        $total = $assets-$discounts;

        return $total;
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
