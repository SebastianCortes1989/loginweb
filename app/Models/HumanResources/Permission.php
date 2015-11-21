<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_permissions';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'collation', 'type_id', 'year'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
