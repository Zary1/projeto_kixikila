<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poupanca extends Model
{
  protected $fillable = [
    'title', 
    'description', 
    'quantidade_geral', 
    'quantidade_participante', 
    'date',
];
  public function admin(){
    return $this->belongsTo('App\Models\RegisterAdmin', 'admins_id');
}
public function users(){
  return $this->belongsToMany('App\Models\User', 'poupanca_user');
}
  }

