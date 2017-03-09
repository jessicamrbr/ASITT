<?php

namespace App;

use App\User;
use App\Ranks_meta_tag;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
   public function user()
   {
      return $this->belongsTo('App\User', 'id_user', 'id');
   }

   public function ranks_meta_tag()
   {
      return $this->belongsTo('App\Ranks_meta_tag', 'id_rank', 'id');
   }
}
