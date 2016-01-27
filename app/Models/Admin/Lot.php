<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'general_lots';

    public function scopeMin($query, $value)
    {
    	return $query->where('rent_min', '<', $value);
    }

    public function scopeMax($query, $value)
    {
    	return $query->where('rent_max', '>', $value);
    }

    public function scopeFamiliar($query)
    {
    	return $query->whereTypeId(1);
    }

    public function scopeMaternal($query)
    {
    	return $query->whereTypeId(2);
    }

    public function scopeInvalid($query)
    {
    	return $query->whereTypeId(3);
    }
}
