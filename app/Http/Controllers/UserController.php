<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   private $userValidateRules = array();

   public function __construct()
   {
      $this->middleware('auth');
      $this->userValidateRules = [
         'name'      => 'required|max:255',
         'email'     => 'required|email|max:255|unique:users,email',
         'password'  => 'required|min:6|confirmed',
         'privilege' => [
            'required',
            Rule::in(['use', 'adm'])
         ],
         'notify'    => [
            'required',
            Rule::in(['y', 'n'])
         ]
      ];
   }

   public function editMyUser()
   {
      $user = User::where("id", "=", Auth::user()->id)->first();
      return view(
         'editMyUser',
         ['user' => $user]
      );
   }

   public function doEditMyUser(Request $req)
   {
      $this->userValidateRules['email'] = $this->userValidateRules['email'] . "," . Auth::user()->id;
      unset($this->userValidateRules['privilege']);

      $this->validate($req, $this->userValidateRules);

      $user = User::where("id", "=", Auth::user()->id)->first();
      $user->name       = $req['name'];
      $user->email      = $req['email'];
      $user->password   = bcrypt($req['password']);
      $user->notify     = $req['notify'];
      $user->save();

      return redirect()
         ->back()
         ->with('message','Usuário atualizado com sucesso.');
   }

   public function showUsers()
   {
      $users = DB::table('users')
         ->orderBy('name', 'asc')
         ->paginate(15);
      return view(
         'admin.showUsers',
         ['users' => $users]
      );
   }

   public function editUser($id)
   {
      $user = User::where("id", "=", $id)->first();
      return view(
         'admin.editUser',
         ['user' => $user]
      );
   }

   public function doEditUser(Request $req)
   {
      $this->userValidateRules['email'] = $this->userValidateRules['email'] . "," . $req['id'];
      unset($this->userValidateRules['privilege']);

      $this->validate($req, $this->userValidateRules);

      $user = User::where("id", "=", $req['id'])->first();
      $user->name       = $req['name'];
      $user->email      = $req['email'];
      $user->password   = bcrypt($req['password']);
      $user->privilege  = $req['privilege'];
      $user->notify     = $req['notify'];
      $user->save();

      return redirect('admin/users')
         ->with('message','Usuário atualizado com sucesso.');
   }

   public function newUser()
   {
      return view('admin.newUser');
   }

   public function doNewUser(Request $req)
   {
      $this->validate($req, $this->userValidateRules);

      User::create([
         'name'      => $req['name'],
         'email'     => $req['email'],
         'password'  => bcrypt($req['password']),
         'privilege' => $req['privilege'],
         'notify'    => $req['notify'],
      ]);

      return redirect('admin/users')
         ->with('message','Usuário registrado com sucesso.');
   }
}
