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
        $subscriptions = \Auth::user()->subscription()->scrapped_data()->paginate(10);
        return $subscriptions;
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

    function feed(Request $request){
        $subscriptions = \Auth::user()->subscription()->get();
        $extention = '/collections/all.atom';
        //$https = 'https://';
    	$url = $request->get('url');
        // /return $url;
    	$feed = Feeds::make($url.$extention);

        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );

        return view('home.feeds', compact('data', 'subscriptions'));
        
    }


}
