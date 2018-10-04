<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function subscribe_url(Request $request){
        if (\Auth::user()->allowed_url > \Auth::user()->subscription()->count()) {
        	$data = $request->all();

        	if ($data) {
                \Auth::user()->subscription()->create($data);
        		return redirect()->back()->with('message', 'Successfully Subscribed!');
        	} else{
        		return redirect()->back()->withErrors(['message', 'Could not subscribe, Try Again!']);
        	}
        }else{
            return redirect('pricing')->with('message', 'Subscription Limit exceeded!');
        }
    }
}
