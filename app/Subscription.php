<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'id', 'user_id', 'url',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
