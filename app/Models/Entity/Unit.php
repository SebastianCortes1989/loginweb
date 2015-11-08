<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_units';
    protected $fillable = ['client_id', 'name', 'employee_id', 'management_id'];

    /*
     * relaciones
   	*/
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function management()
    {
        return $this->belongsTo('App\Models\Entity\Management', 'management_id');
    }
}
