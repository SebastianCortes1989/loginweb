<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExtraHour extends Model
{    
    protected $table = 'rrhh_extra_hours';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'percentaje', 
    'description', 'contract_id', 'hours', 'minutes'];
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
        $date = Carbon::createFromFormat('d/m/Y H:i', $value);
        $this->attributes['start_date'] = $date;
    }

    public function setEndDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y H:i', $value);
        $this->attributes['end_date'] = $date;
    }

    //functions
    public function code()
    {
        return 'HE-'.$this->client_id.'-'.$this->id;
    }

    public function hours($startDate, $endDate)
    {
        $startDate = Carbon::createFromFormat('d/m/Y H:i', $startDate);
        $endDate = Carbon::createFromFormat('d/m/Y H:i', $endDate);

        $hours = $startDate->diffInHours($endDate);

        return $hours;
    }

    public function minutes($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        $minutes = $startDate->diffInMinutes($endDate);
        $minutes = $minutes/60;
        $minutes = explode('.', $minutes);

        if(isset($minutes[1]))
        {
            $minutes = '0.'.$minutes[1];
            return $minutes*60;
        }
    
        return 0;
    }
}
