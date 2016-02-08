<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'rrhh_transfers';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'cause_id', 'from_branch_id', 'to_branch_id', 'contract_id'];
    protected $dates = ['start_date', 'end_date'];

    //relaciones
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function toBranch()
    {
        return $this->belongsTo('App\Models\Entity\Branch', 'to_branch_id');
    }

    public function fromBranch()
    {
        return $this->belongsTo('App\Models\Entity\Branch', 'from_branch_id');
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

    //functions
    public function code()
    {
        return 'TRA-'.$this->client_id.'-'.$this->id;
    }

}
