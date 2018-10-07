<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use Feeds;
class RssController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    function index(){
        //$subscriptions = \Auth::user()->subscription()->get();
        $feed = Feeds::make("https://thehalloweenspirit.com/collections/all.atom");

        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );
    	return view('home.feeds');
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

    function feed(Request $request){
        $subscriptions = \Auth::user()->subscription()->get();
        $extention = '/collections/all.atom';
    	$url = $request->get('url');
    	$feed = Feeds::make($url.$extention);

        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );

        return view('home.feeds', compact('data'));
        
    }
}
