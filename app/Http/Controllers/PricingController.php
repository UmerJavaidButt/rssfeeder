<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index(){
    	return view('pricing.pricing');
    }
}
