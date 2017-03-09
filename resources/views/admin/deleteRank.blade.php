@extends('header')
@section('titleIcon', "linear_scale")
@section('titleName', "Remover fila")
@section('containerPage')
  <div class="row">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/rank/delete') }}">
      {{ csrf_field() }}
      <input id="id" name="id" type="hidden" value="{{ $rk_mt_tags->id }}">
      <div class="card-panel red darken-1">
        <span class="white-text">
          Atenção: operação irreversível!<br>
          Ao se apagar essa fila, todos os dados e posições serão perdidos permanentemente.
        </span>
      </div>
      <div class="card-panel">
        <span class="blue-text text-darken-2">Nome:</span>
        <span class="truncate">{{ $rk_mt_tags->name }}</span>
        <span class="blue-text text-darken-2">Quantidade de profissionais:</span>
        <span class="truncate">{{ $rk_mt_tags->professionals_quantity }}</span>
        <span class="blue-text text-darken-2">Quantidade de atendimentos:</span>
        <span class="truncate">{{ $rk_mt_tags->appointments_average }}</span>
      </div>
      <div class="row">
        <div class="col s12">
          <button type="submit" class="btn transColor">Remover</button>
        </div>
      </div>
    </form>
  </div>
@endsection