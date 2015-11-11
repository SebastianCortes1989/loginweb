<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_contracts_journals';
    protected $fillable = ['contract_id', 'day_start', 'day_end', 'hour_start', 'hour_end', 'collation'];

}
