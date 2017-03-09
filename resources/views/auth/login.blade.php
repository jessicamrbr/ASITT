@extends('header')

@section('containerPageHome')
  <div class="container">
    <div class="row">
      <form id="frmLogin" class="col m6 offset-m3" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12">
            <input id="email" name="email" type="email" value="j@t.c" required autofocus class="validate">
            <label for="email">
              E-mail
            </label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" name="password" type="password" value="123456" required class="validate">
            <label for="password">
              Senha
            </label>
          </div>
        </div>
        <p>
          <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
          <label for="remember">Lembre de mim</label>
        </p>
        <div class="row">
          <div class="col s12">
            <button type="submit" class="btn transColor">Login</button>
            <a class="btn transColor" href="{{ route('password.request') }}">
                Esqueceu sua senha?
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
  @if(count($errors) > 0)
    <script type="text/javascript">
      @foreach ($errors->all() as $error)
        Materialize.toast("{{ $error }}", 4000);
      @endforeach
    </script>
  @endif
@endsection