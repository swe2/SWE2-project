<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public static function send(){
    
        Mail::send(['text'=>'mail'],['name'=>'Admin notify'],function($message){
            $message->to('medo9708@hotmail.com','Admin')->subject('Realestate');
            $message->from('swee2project@gmail.com','admin');
        });
    }
}
