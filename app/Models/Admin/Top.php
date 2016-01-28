<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{   
    protected $table = 'general_tops';

    //funciones
    public static function actual($month, $year)
    {
    	$top = MinimunSalary::start($month, $year)->orderBy('id', 'desc')->first();

        return $top ? $top->value : '0';
    }

    //scopes
    public function scopeStart($query, $month, $year)
    {
    	$date = $year.'-'.$month.'%';

    	return $query->where('start_date', '>', $date);
    }
}
