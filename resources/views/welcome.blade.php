@extends('header')
@section('containerPageHome')
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center">Fila ASITT</h1>
        <div class="row center">
          <h4 class="header col s12">
            Programa de transparência pública para acompanhamento de fila de acesso aos serviços ofertados.
          </h4>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ $url = asset('img/fila.jpg') }}" alt="Filas"></div>
  </div>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
  </script>
@endsection
