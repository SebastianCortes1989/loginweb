<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_charges';
    protected $fillable = ['client_id', 'name', 'unit_id', 'management_id'];

    /*
     * relaciones
   	*/
    public function unit()
    {
        return $this->belongsTo('App\Models\Entity\Unit', 'unit_id');
    }

    public function management()
    {
        return $this->belongsTo('App\Models\Entity\Management', 'management_id');
    }
}
