<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address_user';

    protected $fillable = [
        'address', 
        'fk_municipality',
        'fk_user'
    ];

    public function municipality(){
    	return $this->belongsTo('App\Municipality');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
