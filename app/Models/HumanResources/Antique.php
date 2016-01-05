<?php 

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Antique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_antiques';
    protected $fillable = ['client_id', 'employee_id', 'date', 'contract_id'];
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
        return 'ANT-'.$this->client_id.'-'.$this->id;
    }
}
