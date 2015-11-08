<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_managements';
    protected $fillable = ['client_id', 'name', 'employee_id'];

    /*
     * relaciones
   	*/
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }
}
