<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'general_clients';
    protected $fillable = ['rut', 'name', 'social_reason', 'gyre', 'address', 'region_id', 
    'city_id', 'commune_id', 'phone', 'email', 'name_representative', 'rut_representative',
    'insurance_id', 'complementary_id', 'compensacion_id', 'mideplan'];
}
