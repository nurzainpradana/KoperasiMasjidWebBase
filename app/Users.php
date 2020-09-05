<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "tb_user";

    //Mass Asignment
    protected $fillable = ['name','no_phone','username','password','email','address','date_of_birth','photo_profile'];
}
