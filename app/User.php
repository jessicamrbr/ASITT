<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable;

   protected $fillable = [
      'name',
      'email',
      'password',
      'privilege',
      'notify'
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   public function historics()
   {
      return $this->hasMany('App\Historic', 'id_user_affected', 'id');
   }

   public function historics_authored()
   {
      return $this->hasMany('App\Historic', 'id_user_author', 'id');
   }

   public function publications_authored()
   {
      return $this->hasMany('App\Publication', 'id_user', 'id');
   }

   public function ranks()
   {
      return $this->hasMany('App\Rank', 'id_user', 'id');
   }

   public function timelines()
   {
      return $this->hasMany('App\Timeline', 'id_user', 'id');
   }

   public function timelines_authored()
   {
      return $this->hasMany('App\Timeline', 'id_user_author', 'id');
   }


}
