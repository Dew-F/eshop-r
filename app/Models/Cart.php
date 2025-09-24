<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $fillable = ['ProductID', 'SessionID', 'Count'];
}
