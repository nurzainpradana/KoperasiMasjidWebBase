<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;


class Transaction extends Model
{
    use Notifiable;

    protected $table = "tb_transaction";

    protected $guard = 'tb_transaction';

    protected $fillable = ['name', 'email', 'username', 'password', 'email_verified_at'];

    protected $hidden = ['password'];
}
