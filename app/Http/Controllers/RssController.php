<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use Feeds;
use App\Subscription;
class RssController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    function index(){
        $subscriptions = \Auth::user()->subscription()->with('scrappedData')->with('scrappedData.savedProduct')->get();
        //return $subscriptions;
    	return view('home.feeds', compact('subscriptions'));
    }

    function competitors(){
        return view('home.competitors');
    }

    function savedProducts(){
        return view('home.saved_products');
    }

    function subscribe(){
        return view('home.subscribe');
    }

}
