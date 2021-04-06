<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FCMController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("fcm");
    }
    public function sendNotification($token,$title,$body){
        $token = "e6GK6k4-R728cfGT-gcNOZ:APA91bHwWhUs9RW7yZBaYHeTYKow2SvfFoI5ciIAH0n3Z8BzGeE9oqoasrD_cROLiAQZBMBbAD5W1xFYV4AMuhN-IG9UgKIpns-c83CbRSFrAyu_C_pKPrYIRtaSAz6h6P6QADs-VWHJ";
        $from = "AAAASxvGu0I:APA91bHCxU7WxBgAPmwfoypuTBOLAqFmFvOm45RDKTFBSwuNEUu3LbdoP2YG7iFulC1Cja6ZgNCE4y5C_nlXeSMb4G7duEjxmfcRlb3eFEvndatkUWn4VIkjllAMVQSvDUjhPtePX8nu";
        $msg = array
              (
                'body'  => "wallah zabaat lolololoeee",
                'title' => "hakuna matata",
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        // dd($result);
        curl_close( $ch );
    }

}
