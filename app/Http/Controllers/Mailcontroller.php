<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;

use Mail;

class Mailcontroller extends Controller
{
    public function index()
    {
        $data=[
            'title'=> 'Mail from Drug',
            'body'=> 'just a test'
        ];
        Mail::to("")->send(new TestMail($data));
        return "Email sent";
    }
    
}
