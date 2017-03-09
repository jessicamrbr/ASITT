<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
   public function user()
   {
      return $this->belongsTo('App\User', 'id_user_affected', 'id');
   }

   public function user_author()
   {
      return $this->belongsTo('App\User', 'id_user_author', 'id');
   }
}
