<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterAdmin extends Authenticatable
{
    //
    use HasFactory,Notifiable;
    protected $fillable=
    ['nome','email','phone','password','confime_password','created_at','updated_at'];
    protected $table='register_admins';
}
