<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_discounts';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'quotas', 'description', 'contract_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    //functions
    public function code()
    {
        return 'DES-'.$this->client_id.'-'.$this->id;
    }
}
