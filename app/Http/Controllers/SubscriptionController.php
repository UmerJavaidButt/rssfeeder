<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function subscribe(){
    	$data = $request->all();

    	if ($data) {
    		$subscribe = new \App\Subscription;

    		$subscribe->user_id = $data['user_id'];
    		$subscribe->url = $data['url'];

    		$subscribe->save();
    		return redirect('/');
    	} else{
    		return redirect()->back()->withErrors(['msg', 'Could not subscribe, Try Again!']);
    	}
    }
}
