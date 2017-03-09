<?php

namespace App\Http\Controllers;

use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function showMyTimeline()
   {
      $timeline = Timeline::where('id_user', Auth::user()->id)
         ->orderBy('date', 'asc')
         ->get();
      return view(
         'timeline',
         ['timeline' => $timeline]
      );
   }
}
