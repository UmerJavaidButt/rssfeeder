<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedProducts extends Model
{
    //
    protected $table = 'saved_products';
    protected $fillable = [
        'id', 'favorit_bit', 'scrapped_id'
    ];

    public function scrappedData(){
    	return $this->belongsTo('App\ScrappedData', 'scrapped_id');
    }
   
}
