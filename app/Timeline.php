<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
   public function user()
   {
      return $this->belongsTo('App\User', 'id_user', 'id');
   }

   public function user_author()
   {
      return $this->belongsTo('App\User', 'id_user_author', 'id');
   }
}
