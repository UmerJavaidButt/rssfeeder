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
    	return view('home.feeds');
    }

    function subscribe(){
        return view('home.subscribe');
    }

    function feed(Request $request){
        $extention = '/collections/all.atom';
        //$https = 'https://';
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
