<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use Feeds;
use App\Subscription;
use App\SavedProducts;
use App\ScrappedData;
use Validator;
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

    function filter(Request $request){
        $category_validator = Validator::make($request->all(), [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        if ($category_validator->fails()) {
            return redirect('/');
        }

        $from_date = $request->from_date;
        $to_date = $request->to_date;
//return $from_date;

        $subscriptions = \Auth::user()->subscription()->with(['scrappedData' => function ($query)use($from_date, $to_date) {
            $query->whereBetween('post_date', [$from_date, $to_date]);
        }])->get();
        //return $subscriptions;
    	return view('home.feeds', compact('subscriptions'));
    }

    function competitors(){
        $subscriptions = \Auth::user()->subscription()->get();
        return view('home.competitors', compact('subscriptions'));
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
