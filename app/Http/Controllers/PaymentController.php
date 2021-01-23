<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facedes\Auth;

use Bmatovu\MtnMomo\Products\Collection;

class PaymentController extends Controller
{
    public function admin()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }
    public function user()
    {
        $payment = Payment::where('user_id', Auth()->user()->id)->get();
        return response()->json($payment);
    }
    public function pay(Request $request) 
    {
        $collection = new Collection;
        
        $momoTransactionId = $collection->requestToPay('transaction', '46733123454', 100);
        return response()->json($momoTransactionId);
        
        
     }
    public function status(Request $request) 
    {
        $collection = new Collection;

        // $transaction_no = rand(1, 4);
        // $payment = Payment::create([
        //     'user_id' => Auth()->user()->id,
        //     'phone' => '46733123454',
        //     'name'=> $request->name,
        //     'fullname' =>Auth()->user()->firstname.' '.Auth()->user()->lastname,
        //     'email' => Auth()->user()->email,
        //     'amount' => $request->amount,

        // ]);
        

        // return response()->json([
        //     'payment' => $payment,
        //     'status' => 'Pending',
        //     'number' => $transaction_no
        //     ]);
        $checkstatus = $request->transaction;
        // $checkstatus = "5925205f-e2e0-46b0-b933-45cd04e3ec67";
        //$checkstatus = "64aafab1-7793-4d49-9acf-cc371c2ca947";
        $newstatus = $collection->getTransactionStatus("$checkstatus");
        

        // if($token_obj = 'SUCCESSFUL') {
        //     return response()->json('Payment Successful');
        //return response()->json($responseMsg);
        // if($active) {
        //     return response()->json($active);
        // } else {
        //     return response()->json('Not Active');
        // }
        //return response()->json($momoTransactionId);
        
        //$token_obj = $newstatus['status'];
    //     $token_b = $responseMsg['payer'];
    //     $token_c = $token_b['partyId'];
        //$amout = $responseMsg['amount'];
    //     if($token_obj = 'pending') {
    //         return response()->json('Please Enter Mobile Pin '.$token_c.'for amount'.$amount);
    //     } elseif($token_obj = 'failed') {
    //         return response()->json('Payment Request Failed! Please try again');
    //     }
    //     // dd($token_c);
    //     // dd($token_b);
        return response()->json($newstatus['status']);
    //
        // }
    }

}
