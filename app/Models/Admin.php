<?php

namespace App\Models;

use App\Notifications\customPasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'admin';
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'first_name',
        'last_name',
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new customPasswordResetNotification($token));
    }
}
