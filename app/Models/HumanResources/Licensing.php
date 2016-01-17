<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Licensing extends Model
{
    protected $table = 'rrhh_licensings';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'number', 
    'work_accident', 'contract_id', 'days'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'start_date', 'end_date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
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
        return 'LIC-'.$this->client_id.'-'.$this->id;
    }

    public function days($startDate, $endDate)
    {
        $startDate = Carbon::createFromFormat('d/m/Y', $startDate);
        $endDate = Carbon::createFromFormat('d/m/Y', $endDate);

        $days = $startDate->diffInDays($endDate);

        return $days;
    }
}
