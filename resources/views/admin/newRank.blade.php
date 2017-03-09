@extends('header')
@section('titleIcon', "linear_scale")
@section('titleName', "Registrar nova fila")
@section('containerPage')
  <div class="row">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/rank/new') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus class="validate">
          <label for="name">
            Nome
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="professionals_quantity" name="professionals_quantity" type="text" value="{{ old('professionals_quantity') }}" required class="validate">
          <label for="professionals_quantity">
            Quantidade de profissionais
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="appointments_average" name="appointments_average" type="text" value="{{ old('appointments_average') }}" required class="validate">
          <label for="appointments_average">
            Quantidade de atendimentos
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <button type="submit" class="btn transColor">Registrar</button>
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
