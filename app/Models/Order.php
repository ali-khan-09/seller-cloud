<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
            'user_id',
            'cart_id',
            'first_name',
            'last_name',
            'phone',
            'email',
            'company',
            'address',
            'city',
            'state',
            'zip',
            'comments',
            'shipping_method',
            'is_multiple_shipping',
            'order_status'
    ];
    // public function distributer()
    // {
    // 	return $this->hasMany(Distributer::class,'distributer_id');
    // }
    // public function details()
    // {
    // 	return $this->hasMany(Detail:class);
    // }
    // public function Distributor()
    // {
    // 	return $this->hasOne(Distributor:class);
    // }
}
