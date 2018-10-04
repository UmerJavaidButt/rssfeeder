<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payment';
    protected $fillable = [
        'id', 'user_id', 'token', 'transaction_id', 'response',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
