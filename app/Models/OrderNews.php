<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNews extends Model
{
    use HasFactory;

    protected $table = 'orders_news';
    public $timestamps = false;
    protected $fillable = ['name', 'phone', 'email','order_information'];
}
