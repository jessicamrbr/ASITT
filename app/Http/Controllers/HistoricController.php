<?php

namespace App\Http\Controllers;

use App\Historic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function showHistorics()
   {
      $historics = Historic::where("id_user_affected", "=", Auth::user()->id)
         ->orderBy('moment', 'desc')
         ->get();
      return view(
         'historics',
         ['historics' => $historics]
      );
   }
}
