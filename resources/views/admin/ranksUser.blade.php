@extends('header')
@section('titleIcon', "format_list_bulleted")
@section('titleName', "Gerênciar filas do usuário")
@section('containerPage')
   <div class="row">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/ranks/') }}">
         {{ csrf_field() }}
         <input id="user_id" name="user_id" type="hidden" value="{{ $user_id }}">
         <div class="row">
            <div class="card-panel">
               <h4>Presente nas filas</h4>
               <div class="row">
                  @forelse ($ranks_with_user->chunk((ceil($ranks_with_user->count()/3))) as $chunk_rk)
                     <div class="col s12 m4">
                        @foreach ($chunk_rk as $rank)
                           <p>
                              <input type="checkbox" id="ckb{{ $rank->ranks_meta_tag->id }}"
                                 checked="checked"  disabled="disabled"/>
                              <label for="ckb{{ $rank->ranks_meta_tag->id }}">{{ $rank->ranks_meta_tag->name }}</label>
                           </p>
                        @endforeach
                     </div>
                  @empty
                     <center>Ausente em todas as filas</center>
                  @endforelse
               </div>
               <div class="row right-align">
                     * Para remover o usuário destas filas, acesse o gerênciador de posições da fila.
               </div>
            </div>
         </div>
         <div class="row">
            <div class="card-panel">
               <h4>Ausente nas filas</h4>
               <div class="row">
                  @forelse ($rks_mt_tags->chunk(ceil($rks_mt_tags->count()/3)) as $chunk_rk)
                     <div class="col s12 m4">
                        @foreach ($chunk_rk as $rk_mt_tags)
                        <p>
                           <input type="checkbox" id="ckb{{ $rk_mt_tags->id }}"
                              name="ckb[]" value="{{ $rk_mt_tags->id }}"/>
                           <label for="ckb{{ $rk_mt_tags->id }}">{{ $rk_mt_tags->name }}</label>
                        </p>
                        @endforeach
                     </div>
                  @empty
                     <center>Presente em todas as filas</center>
                  @endforelse
               </div>
               <div class="row">
                  <div class="col s12">
                     <button type="submit" class="btn transColor">Adicionar as filas selecionadas</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
   @if(count($errors) > 0)
      <script type="text/javascript">
         @foreach ($errors->all() as $error)
            Materialize.toast("{{ $error }}", 4000);
         @endforeach
      </script>
   @endif
   <script type="text/javascript">
      $(document).ready(function() {
         $('select').material_select();
      });
   </script>
@endsection
