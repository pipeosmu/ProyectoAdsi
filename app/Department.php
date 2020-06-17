<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name_department', 
    ];

    public function municipalities(){
    	return $this->hasMany('App\Municipality');
    }
}
