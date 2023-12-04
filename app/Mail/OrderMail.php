<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\cart;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public cart $cart;

   
    
    public function __construct(cart $cart)
    {
        $this->cart= $cart;
        //
    }
 

    public function build()
    {
        return $this -> subject('Order Confirmation')->view('mail.order-mail');
    }
}
