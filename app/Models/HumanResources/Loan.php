<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    protected $table = 'rrhh_loans';
    protected $fillable = ['client_id', 'employee_id', 'day', 'month', 'year', 'type_id', 'quotas', 'ammount', 'contract_id', 'grant_date'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'grant_date'];

    // relaciones
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function rQuotas()
    {
        return $this->hasMany('App\Models\HumanResources\LoanQuota', 'loan_id');
    }

    // mutators
    public function setGrantDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['grant_date'] = $date->format('Y-m-d');
    }

    // functions
    public function code()
    {
        return 'PP-'.$this->client_id.'-'.$this->id;
    }

    public function deleteQuotas()
    {
        $quotas = $this->rQuotas()->delete();
    }

    public function createQuotas()
    {
        for ($i=1; $i <= $this->quotas; $i++)
        {
            $quota = new LoanQuota;

            $ammount = $quota->generateAmmount($this->ammount, $this->quotas);
            $date = $quota->generateDate($this->day, $this->month, $this->year, $i);

            $quota->contract_id = $this->contract_id;
            $quota->employee_id = $this->employee_id;
            $quota->loan_id     = $this->id;
            $quota->number      = $i;
            $quota->ammount     = $ammount;
            $quota->date        = $date;
            $quota->save();
        }
    }
}
