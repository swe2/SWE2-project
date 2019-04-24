<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function send(){
    
        Mail::send(['text'=>'mail'],['name'=>'Admin notify'],function($message){
            $message->to('alt.rp-61ilgt9@yopmail.com','Admin')->subject('Realestate');
            $message->from('swe2project@yahoo.com','admin');
        });
    }
}
