@extends('header')
@section('titleIcon', "perm_identity")
@section('titleName', "Registrar novo usuário")
@section('containerPage')
  <div class="row">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user/new') }}">
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
          <input id="email" name="email" type="email" value="{{ old('email') }}" required class="validate">
          <label for="email">
            E-mail
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" required class="validate">
          <label for="password">
            Senha
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password_confirmation" name="password_confirmation" type="password" required class="validate">
          <label for="password_confirmation">
            Confirmação de senha
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select id="privilege" name="privilege" required class="validate">
            <option value="use" selected>Usuário</option>
            <option value="adm">Administrador</option>
          </select>
          <label for="privilege">
            Privilégios
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select id="notify" name="notify" required class="validate">
            <option value="y" selected>Sim</option>
            <option value="n">Não</option>
          </select>
          <label for="notify">
            Avisar-me
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
  @if(session('message'))
    <script type="text/javascript">
      Materialize.toast("{{session('message')}}", 4000);
    </script>
  @endif
  <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
@endsection
