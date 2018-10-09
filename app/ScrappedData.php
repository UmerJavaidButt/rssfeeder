<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrappedData extends Model
{
    //
    protected $table = 'scrapped_data';
    protected $fillable = [
        'id', 'subscription_id', 'post_date', 'post_description', 'post_url', 'post_title'
    ];

    public function subscription(){
    	return $this->belongsTo('App\Subscription', 'subscription_id');
    }
    public function savedProduct(){
        return $this->hasOne('App\SavedProducts', 'scrapped_id');
    }
}
