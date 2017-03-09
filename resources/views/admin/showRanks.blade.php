@extends('header')
@section('titleIcon', "linear_scale")
@section('titleName', "Filas")
@section('containerPage')
<section id="cd-timeline">
  <table>
    <thead>
      <tr>
        <th class="center-align">Nome</th>
        <th class="center-align hide-on-med-and-down" width="15%">
          Quantidade de profissionais
        </th>
        <th class="center-align hide-on-med-and-down" width="15%">
          Média de atendimentos semanais
        </th>
        <th class="center-align" width="15%">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rks_mt_tags as $rk_mt_tags)
        <tr>
          <td >
            {{$rk_mt_tags->name}}
          </td>
          <td class="center-align hide-on-med-and-down">
            {{$rk_mt_tags->professionals_quantity}}
          </td>
          <td class="center-align hide-on-med-and-down">
            {{$rk_mt_tags->appointments_average}}
          </td>
          <td class="center-align">
            <div class="fixed-action-btn horizontal click-to-toggle" style="position:relative; right:0px; bottom:10px;">
              <a class="btn-floating btn tooltipped" data-position="left"
                data-delay="50" data-tooltip="Menu">
                <i class="material-icons">menu</i>
              </a>
              <ul>
                <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Editar fila"
                  href="{{ url('/admin/rank/edit') }}/{{$rk_mt_tags->id}}/">
                  <i class="material-icons">edit</i></a></li>
                <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Listar posições"
                  href="{{ url('/admin/rank') }}/{{$rk_mt_tags->id}}/">
                  <i class="material-icons">list</i></a></li>
                <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                  data-delay="50" data-tooltip="Remover fila"
                  href="{{ url('/admin/rank/delete') }}/{{$rk_mt_tags->id}}/">
                  <i class="material-icons">delete</i></a></li>
              </ul>
            </div>  
          </td>
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
