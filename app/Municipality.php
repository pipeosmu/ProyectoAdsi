<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $fillable = [
        'name_municipality',
        'fk_department'
    ];

    public function addresses(){
    	return $this->hasMany('App\Address');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }
}
