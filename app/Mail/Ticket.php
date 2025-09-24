<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;

class Ticket extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $mail;
    public $total;
    public $products;
    public $num;
    public $orderproducts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $products, $orderproducts)
    {
        $this->date = $order->CreatedAt;
        $this->mail = $order->Email;
        $this->total = $order->Total;
        $this->num = $order->ID;
        $this->products = $products;
        $this->orderproducts = $orderproducts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('includes.ticket')->subject("Чек #".$this->num."");

        return $this;
    }
}
