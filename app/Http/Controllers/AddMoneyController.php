<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use App\Payment;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

class AddMoneyController extends Controller
{
    //
    public function payWithStripe($amount)
    {
        return view('pricing.paywithstripe', compact('amount'));
    }
    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'card_no' => 'required',
        'ccExpiryMonth' => 'required',
        'ccExpiryYear' => 'required',
        'cvvNumber' => 'required',
        'amount' => 'required',
        ]);
        $input = $request->all();
        if ($validator->passes()) { 
            $input = array_except($input,array('_token'));
            $stripe = Stripe::make('sk_test_PVXtzkhKGE6eV0iuxTqgh4iZ');
            try {
                $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->get('card_no'),
                    'exp_month' => $request->get('ccExpiryMonth'),
                    'exp_year' => $request->get('ccExpiryYear'),
                    'cvc' => $request->get('cvvNumber'),
                ],
            ]);
            // $token = $stripe->tokens()->create([
            // 'card' => [
            // 'number' => '4242424242424242',
            // 'exp_month' => 10,
            // 'cvc' => 314,
            // 'exp_year' => 2020,
            // ],
             // ]);
            if (!isset($token['id'])) {
                return redirect()->route('addmoney.paywithstripe');
        }
        $charge = $stripe->charges()->create([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount' => $request->get('amount'),
            'description' => 'Add in wallet',
            ]);
 
        if($charge['status'] == 'succeeded') {
 /*
 Business Logic Payment table
 */

$payment = new Payment;
$payment->user_id = \Auth::user()->id;
$payment->token = $token['id'];
$payment->transaction_id = $charge['id'];
$payment->response = json_encode($charge);

$payment->save();

/*
 Business Logic Payment table
 */
$amount =  $request->get('amount');
 if ($amount >= 4.99 && $amount < 9.99) {
     \Auth::user()->allowed_url += 10;
     \Auth::user()->save();
 } elseif($amount >= 9.99 && $amount < 19.99){
    \Auth::user()->allowed_url += 25;
     \Auth::user()->save();
 } elseif ($amount >= 19.99) {
     \Auth::user()->allowed_url = 214748364;
     \Auth::user()->save();
 }

return redirect('/')->with('message','You have successfully Purchased!');
    } else {
        \Session::put('error','Money not add in wallet!!');
        return redirect()->route('addmoney.paywithstripe');
        }
    } catch (Exception $e) {
        \Session::put('error',$e->getMessage());
        return redirect()->route('addmoney.paywithstripe');
    } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
        \Session::put('error',$e->getMessage());
        return redirect()->route('addmoney.paywithstripe');
        } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
        \Session::put('error',$e->getMessage());
        return redirect()->route('addmoney.paywithstripe');
    }
    }
 }
}
