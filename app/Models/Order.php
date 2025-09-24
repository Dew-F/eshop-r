<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $fillable = ['UserID', 'PayStatus', 'OrderStatus', 'DeliveryMethod', 'PayMethod', 'FullName', 'Telephone', 'Email', 'Address', 'Total', 'CreatedAt'];
}
