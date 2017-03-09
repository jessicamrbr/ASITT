@extends('header')
@section('titleIcon', "linear_scale")
@section('titleName', "Fila: " . $rank[0]->ranks_meta_tag->name)
@section('containerPage')
<section id="cd-timeline">
  <table>
    <thead>
      <tr>
        <th class="center-align">Usuário</th>
        <th class="center-align" width="15%">Posição</th>
        <th class="center-align" width="15%">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rank as $position)
        <tr>
          <td>
            {{$position->user->name}}
          </td>
          <td class="center-align">
            {{$position->position}}º
          </td>
          <td class="center-align">
            <div class="fixed-action-btn horizontal click-to-toggle" style="position:relative; right:0px; bottom:10px;">
              <a class="btn-floating btn tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Menu">
                <i class="material-icons">menu</i>
              </a>
              <ul>
                <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Trocar posição"
                  href="{{ url('/admin/position/swap') }}/{{$position->id}}/">
                  <i class="material-icons">swap_vert</i></a></li>
                <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Marcar conclusão"
                  href="{{ url('/admin/position/finish') }}/{{$position->id}}/">
                  <i class="material-icons">beenhere</i></a></li>
              </ul>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <center>{{ $rank->links() }}</center>
</section>
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
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>
@endsection
