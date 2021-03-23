<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Distributer extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
    	'name',
        'username',
        'email',
        'phone',
        'city',
        'state',
        'address',
        'postal_code',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
}
