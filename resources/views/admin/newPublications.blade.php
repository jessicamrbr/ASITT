@extends('header')
@section('titleIcon', "description")
@section('titleName', "Registrar nova publicação")
@section('containerPage')
  <div class="row">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/publications/new') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input id="subject" name="subject" type="text" value="{{ old('email') }}" required class="validate">
          <label for="subject">
            Assunto
          </label>
        </div>
      </div>
      <div class="file-field input-field">
        <div class="">
          <i class="material-icons prefix">attach_file</i>
          <input id="attachment" name="attachment" type="file">
        </div>
        <div class="file-path-wrapper">
          <input id="attachment-mask" name="attachment-mask" class="file-path validate" type="text"
            placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anexo">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">insert_invitation</i>
          <input id="date" name="date" type="date" required class="validate datepicker">
          <label for="date">
            Data
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('.datepicker').pickadate({
        monthsFull: [
          'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
          'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdaysFull: ['Domingo', 'Segundo', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        today: 'Hoje',
        clear: 'Cancelar',
        close: '<i class="material-icons">close</i>',
        selectMonths: true,
        selectYears: 15,
        format: 'dd/mm/yyyy',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        min: new Date(),
      });
    });
  </script>
@endsection
