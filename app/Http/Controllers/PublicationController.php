<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
   private $publicationValidateRules = array();

   public function __construct()
   {
      $this->middleware('auth');
      $this->publicationValidateRules = [
         'subject'         => 'required|string|max:255',
         'attachment'      => 'required',
         'date'            => 'required|date|after_or_equal:"' . date('d/m/Y 00:00:00', strtotime("today")) . '"'
      ];
   }

   public function showPublications()
   {
      $publications = Publication::orderBy('date', 'desc')->get();
      return view(
         'publications',
         ['publications' => $publications]
      );
   }

   public function newPublications()
   {
      return view('admin.newPublications');
   }

   public function doNewPublications(Request $req)
   {
      $reqDateToMysql = date('Y-m-d 00:00:00', strtotime($req['date']));
      $req['date']    = date('d/m/Y 00:00:00', strtotime($req['date']));

      $this->validate($req, $this->publicationValidateRules);

      $publication = Publication::create([
         'id_user'     => Auth::user()->id,
         'subject'     => $req['subject'],
         'attachment'  => '',
         'date'        => $reqDateToMysql
      ]);

      $destinationPath  = 'uploads/publicacoes';
      $extension        = $req->file('attachment')->getClientOriginalExtension();
      $fileName         = 'pub.' . $publication->id . '.' . $extension;
      $req
         ->file('attachment')
         ->move($destinationPath, $fileName);

      $publication->attachment = $fileName;
      $publication->save();

      return redirect('publications')
         ->with('message', 'Publicação registrada com sucesso.');
   }
}
