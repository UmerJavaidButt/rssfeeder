<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use Feeds;
use App\Subscription;
class ScrapController extends Controller
{
    //

    function rss_scrap(){
        $extention = '/collections/all.atom';
        $subscriptions = Subscription::all();
        foreach($subscriptions as $subscription){
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
}
