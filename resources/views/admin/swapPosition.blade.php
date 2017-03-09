@extends('header')
@section('titleIcon', "swap_vert")
@section('titleName', "Trocar posição")
@section('containerPage')
<div class="row">
   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/position/swap') }}">
      {{ csrf_field() }}
      <input id="idPosition" name="idPosition" type="hidden" value="{{$position->id}}">
      <input id="idRank" name="idRank" type="hidden" value="{{$position->id_rank}}">
      <div class="section">
         <h5>Situação atual</h5>
         <table class="striped">
            <thead>
               <tr>
                  <th data-field="id">Nome</th>
                  <th data-field="id">Fila</th>
                  <th data-field="name">Posição</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $position->user->name }}</td>
                  <td>{{ $position->ranks_meta_tag->name }}</td>
                  <td>{{ $position->position }}</td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="row">
         <div class="input-field col s12">
            <input id="finalPosition" name="finalPosition" type="text" value="" required class="validate">
            <label for="finalPosition">
               Nova posição
            </label>
         </div>
      </div>
      <div class="row">
         <div class="input-field col s12">
            <input id="justifyNote" name="justifyNote" type="text" value="" required class="validate">
            <label for="justifyNote">
               Justificativa aos usuários afetados
            </label>
         </div>
      </div>
      <div class="row">
         <div class="col s12">
            <button type="submit" class="btn transColor">Trocar</button>
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
@endsection
