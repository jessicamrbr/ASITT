@extends('header')
@section('titleIcon', "description")
@section('titleName', "Publicações")
@section('containerPage')
<section id="cd-timeline">
  <table>
    <thead>
      <tr>
        <th>Assunto</th>
        <th>Anexo</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
      @foreach($publications as $publication)
      <tr>
        <td>{{$publication->subject}}</td>
        <td><a href="/uploads/publicacoes/{{$publication->attachment}}"><i class="material-icons">attach_file</i></a></td>
        <td>{{date('d/m/Y', strtotime($publication->date))}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@if(session('message'))
  <script type="text/javascript">
    Materialize.toast("{{session('message')}}", 4000);
  </script>
@endif
@endsection
