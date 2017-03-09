<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranks_meta_tag extends Model
{
   protected $fillable = [
      'name',
      'professionals_quantity',
      'appointments_average'
   ];

   public $timestamps = false;

   public function ranks()
   {
      return $this->hasMany('App\Rank', 'id_rank', 'id');
   }
}
