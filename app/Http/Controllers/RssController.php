<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use Feeds;
use App\Subscription;
use App\SavedProducts;
use App\ScrappedData;
class RssController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    function index(){
        $subscriptions = \Auth::user()->subscription()->with('scrappedData')->get();
        //return $subscriptions;
    	return view('home.feeds', compact('subscriptions'));
    }

    function competitors(){
        return view('home.competitors');
    }

    function savedProducts(){
        $subscriptions = \Auth::user()->subscription()->with('scrappedData')->get();
        return view('home.saved_products', compact('subscriptions'));
    }

    function subscribe(){
        return view('home.subscribe');
    }

    function rate_product($id, $val){
        
        $product = ScrappedData::where('id', $id)->first();
        if(!empty($product)){
            $product->favorite_bit = $val;
            $product->save();
            return json_encode(array('success'=>1, 'msgs'=>'changed status'));
        }
        return json_encode(array('success'=>0, 'msgs'=>'not changed status'));
    }
}
