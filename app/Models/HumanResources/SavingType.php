<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class SavingType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_savings_types';
    protected $fillable = ['name'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
