<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
  protected $fillable = [
    'id_user',
    'subject',
    'attachment',
    'date'
  ];

  public $timestamps = false;

   public function user_author()
   {
      return $this->belongsTo('App\User', 'id_user', 'id');
   }
}
