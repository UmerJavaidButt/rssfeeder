<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use FeedReader;
use Feeds;

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
                $subscription = \Auth::user()->subscription()->create($data);
                //return $subscription->url;
                 $this->rss_scrap($subscription);
        		return redirect()->back()->with('message', 'Successfully Subscribed!');
        	} else{
        		return redirect()->back()->withErrors(['message', 'Could not subscribe, Try Again!']);
        	}
        }else{
            return redirect('pricing')->with('message', 'Subscription Limit exceeded!');
        }
    }

    function rss_scrap($subscription){
        $extention = '/collections/all.atom';
        $url = $subscription->url;
        $feed = Feeds::make($url.$extention);
        $items = $feed->get_items();
        if(is_array($items)){
            foreach($items as $item){
                $data = array();
                $data['post_url'] =  $item->get_permalink();
                $data['post_title'] =  $item->get_title();
                $data['post_description'] =  base64_encode($item->get_content());
                $data['post_date'] =   $item->get_date('Y-m-d h:m:i');
                $subscription->scrappedData()->updateOrCreate(['post_title'=>$item->get_title()],$data);
            }
        }
        
    }
}
