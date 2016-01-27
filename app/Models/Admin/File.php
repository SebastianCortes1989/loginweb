<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'general_files';
    protected $fillable = ['size', 'name', 'mime', 'filename', 'author_id', 'imageable_id', 'imageable_type'];
    public $destinationPath;

    public function __construct(){
    	$this->destinationPath = public_path().'/uploads';
    }

}
