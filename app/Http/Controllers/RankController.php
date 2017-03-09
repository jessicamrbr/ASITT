<?php

namespace App\Http\Controllers;

use App\Rank;
use App\Ranks_meta_tag;
use App\User;

use Khill\Lavacharts\Lavacharts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class RankController extends Controller
{
   private $rkmValidateRules = array();
   private $changePositionValidateRules = array();
   private $addPositionValidateRules = array();

   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct(Request $req)
   {
      $this->middleware('auth');
      $this->rkmValidateRules = [
         'name'                     => 'required|max:255|unique:ranks_meta_tags,name',
         'professionals_quantity'   => 'required|max:5',
         'appointments_average'     => 'required|max:5'
      ];
      $this->changePositionValidateRules  = [
         'idPosition'               => 'required|integer|min:1',
         'idRank'                   => 'required|integer|min:1',
         'justifyNote'              => 'required|max:250'
      ];
      $this->addPositionValidateRules  = [
         'user_id'                  => 'required|integer|min:1'
      ];
   }

   private function getTotalForName($rks_total, $name_rk)
   {
      foreach($rks_total as $rk_total){
         if ($rk_total->ranks_meta_tag->name  == $name_rk) {
            return $rk_total->total;
         }
      }
   }

   public function showMyPositionsInRanks()
   {
      $votes        = \Lava::DataTable();
      $rks_mt_tags  = Ranks_meta_tag::orderBy('name', 'asc')->get();
      $ranks        = Rank::where("id_user", "=", Auth::user()->id)
         ->get()
         ->sortBy(function($rank) {
            return $rank->ranks_meta_tag->name;
         });
      $rks_total    = Rank::select('id_rank', \DB::raw('count(*) as total'))->groupBy('id_rank')->get();

      $votes->addStringColumn('Fila')
         ->addNumberColumn('Sua posição')
         ->addRoleColumn('string', 'style')
         ->addNumberColumn('Pessoas aguardando depois de você')
         ->addRoleColumn('string', 'style');

      foreach($ranks as $rank){
         $votes->addRow([
            $rank->ranks_meta_tag->name,
            $rank->position,
            "color:#5bcefa",
            $this->getTotalForName($rks_total, $rank->ranks_meta_tag->name) - $rank->position,
            "color:#f5a9b8"
         ]);
      }

      $max_in_grid = 0;
      foreach($rks_total as $rk_total) {
         if ($max_in_grid < $rk_total->total) {
            $max_in_grid = $rk_total->total;
         }
      }
      if ($max_in_grid > 2000) {$max_in_grid = 2000;}

      $min_in_grid = $ranks[0]->position;
      foreach($ranks as $rank){
         if ($min_in_grid > $rank->position) {
            $min_in_grid = $rank->position;
         }
      }

      if ($max_in_grid < 180 || $min_in_grid > ceil($max_in_grid/5)) {
         $scaleType = 'null';
         $ticks     = range(0, $max_in_grid, ceil($max_in_grid/5));
      } else {
         $scaleType = 'mirrorLog';
         $ticks[]   = 0;
         $ticks[]   = round(log(0.83*1.215,5)*$max_in_grid);
         $ticks[]   = round(log(0.83*1.321,5)*$max_in_grid);
         $ticks[]   = round(log(0.83*1.799,5)*$max_in_grid);
         $ticks[]   = round(log(0.83*2.888,5)*$max_in_grid);
         $ticks[]   = $max_in_grid;
      }

      $barchart = \Lava::BarChart('Votes', $votes, [
         'isStacked'        => true,
         'colors'           => ['#5bcefa', '#f5a9b8'],
         'chartArea'        => [
            'left'          => 90,
            'width'         => '100%'
         ],
         'legend'           => [
            'position'      => 'top',
            'alignment'     => 'start'
         ],
         'hAxis'            => [
            'ticks'         => $ticks,
            'slantedText'   => true,
            'format'        => '',
            'scaleType'     => $scaleType,
            'viewWindow'    => [
               'max'        => $max_in_grid
            ]
         ]
      ]);

      return view(
         'resume',
         [
            'rks_mt_tags' => $rks_mt_tags,
            'rks_total'   => $rks_total,
            'barchart'    => $barchart
         ]
      );
   }

   public function showRanks()
   {
      $rks_mt_tags = Ranks_meta_tag::orderBy('name', 'asc')->get();
      return view(
         'admin.showRanks',
         ['rks_mt_tags' => $rks_mt_tags]
      );
   }

   public function editRank($id)
   {
      $rks_mt_tags = Ranks_meta_tag::where("id", "=", $id)->first();
      return view(
         'admin.editRank',
         ['rks_mt_tags' => $rks_mt_tags]
      );
   }

   public function doUpdateRank(Request $req)
   {
      $this->rkmValidateRules['name'] = $this->rkmValidateRules['name'].",".$req['id'];
      $this->validate($req, $this->rkmValidateRules);

      $rks_mt_tags = Ranks_meta_tag::where("id", "=", $req['id'])->first();
      $rks_mt_tags->name                        = $req['name'];
      $rks_mt_tags->professionals_quantity      = $req['professionals_quantity'];
      $rks_mt_tags->appointments_average        = $req['appointments_average'];
      $rks_mt_tags->save();

      return redirect()
         ->back()
         ->with('message','Fila atualizada com sucesso.');
   }

   public function deleteRank($id)
   {
      $rk_mt_tags = Ranks_meta_tag::where("id", "=", $id)->first();
      return view(
         'admin.deleteRank',
         ['rk_mt_tags' => $rk_mt_tags]
      );
   }

   public function doDeleteRank(Request $req)
   {
      Ranks_meta_tag::destroy($req['id']);
      return redirect('admin/ranks')
         ->with('message','Fila removida com sucesso.');
   }

   public function newRank()
   {
      return view('admin.newRank');
   }

   public function doNewRank(Request $req)
   {
      $this->validate($req, $this->rkmValidateRules);

      Ranks_meta_tag::create([
         'name'                        => $req['name'],
         'professionals_quantity'      => $req['professionals_quantity'],
         'appointments_average'        => $req['appointments_average']
      ]);
      return redirect('admin/ranks')
         ->with('message','Fila adicionada com sucesso.');
   }

   public function showRank($id)
   {
      $rank = Rank::where("id_rank", "=", $id)
         ->orderBy('position', 'asc')
         ->paginate(15);
      return view(
         'admin.showRank',
         ['rank' => $rank]
      );
   }

   public function swapPositions($id)
   {
      $position= Rank::where("id", "=", $id)->first();
      return view(
         'admin.swapPosition',
         ['position' => $position]
      );
   }

   public function doSwapPositions(Request $req)
   {
      $this->changePositionValidateRules['finalPosition'] = 'required|integer|min:1';
      $this->validate($req, $this->changePositionValidateRules);

      $sql  = "call swap_position(";
      $sql .= "\"" . $req['idPosition'] . "\", ";
      $sql .= "\"" . $req['finalPosition'] . "\", ";
      $sql .= "\"" . Auth::user()->id . "\", ";
      $sql .= "\"" . $req['justifyNote'] . "\"" ;
      $sql .= ")";
      DB::statement($sql);

      return redirect('admin/rank/'.$req['idRank'])
         ->with('message','Posição alterada com sucesso.');
   }

   public function finishPositions($id)
   {
      $position= Rank::where("id", "=", $id)->first();
      return view(
         'admin.finishPositions',
         ['position' => $position]
      );
   }

   public function doFinishPositions(Request $req)
   {
      $this->validate($req, $this->changePositionValidateRules);

      $sql  = "call finish_position(";
      $sql .= "\"" . $req['idPosition'] . "\", ";
      $sql .= "\"" . Auth::user()->id . "\", ";
      $sql .= "\"" . $req['justifyNote'] . "\"" ;
      $sql .= ")";
      DB::statement($sql);

      return redirect('admin/rank/'.$req['idRank'] )
         ->with('message','Posição finalizada com sucesso.');
   }

   public function ranksUser($id)
   {
      $ranks_with_user  = Rank::where("id_user", "=", Auth::user()->id)
         ->get()
         ->sortBy(function($rank) {
            return $rank->ranks_meta_tag->name;
         });

      $rks_mt_tags      = Ranks_meta_tag::orderBy('name', 'asc')->get();

      foreach ($rks_mt_tags as $key => $item) {
         $set_to_remove = false;
         foreach ($ranks_with_user as $rank_with_user) {
            if ($item->id == $rank_with_user->id_rank) {
               $set_to_remove = true;
            }
         }
         if ($set_to_remove) {
            $rks_mt_tags->pull($key);
         }
      }

      return view(
         'admin.ranksUser',
         [
            'user_id' => $id,
            'ranks_with_user' => $ranks_with_user,
            'rks_mt_tags' => $rks_mt_tags,
         ]
      );
   }

   public function doRanksUser(Request $req)
   {
      foreach($req['ckb'] as $key => $val)
      {
         $this->addPositionValidateRules['ckb.'.$key] = 'required|integer|min:1';
      }
      $this->validate($req, $this->addPositionValidateRules);

      foreach($req['ckb'] as $key => $val)
      {
         $sql  = "call add_position(";
         $sql .= "\"" . $val . "\", ";
         $sql .= "\"" . $req['user_id'] . "\"" ;
         $sql .= ")";
         DB::statement($sql);
      }

      return redirect('admin/users')
         ->with('message','Filas e usuário atualizados com sucesso.');
   }
}
