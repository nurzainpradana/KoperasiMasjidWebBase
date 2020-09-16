<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $table = "tb_admin";

    protected $guard = 'tb_admin';

    protected $fillable = ['name', 'email', 'username', 'password', 'email_verified_at'];

    protected $hidden = ['password'];
}
