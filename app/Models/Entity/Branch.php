<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'general_branchs';
    protected $fillable = ['client_id', 'name', 'address'];

}
