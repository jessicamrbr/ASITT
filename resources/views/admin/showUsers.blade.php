@extends('header')
@section('titleIcon', "people")
@section('titleName', "Usuários")
@section('containerPage')
<section id="cd-timeline">
  <table>
    <thead>
      <tr>
        <th class="center-align" width="15%">id</th>
        <th class="center-align">Nome</th>
        <th class="center-align" width="15%">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td class="center-align" >{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td class="center-align">
          <div class="fixed-action-btn horizontal click-to-toggle" style="position:relative; right:0px; bottom:10px;">
            <a class="btn-floating btn tooltipped" data-position="left"
               data-delay="50" data-tooltip="Menu">
              <i class="material-icons">menu</i>
            </a>
            <ul>
              <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                     data-delay="50" data-tooltip="Editar usuário"
                     href="{{ url('/admin/user/edit') }}/{{$user->id}}/">
                <i class="material-icons">edit</i></a></li>
              <li><a class="btn-floating waves-effect waves-light tooltipped" data-position="left"
                     data-delay="50" data-tooltip="Gerenciar filas do usuário"
                     href="{{ url('/admin/user/ranks') }}/{{$user->id}}/">
                <i class="material-icons">format_list_bulleted</i></a></li>
            </ul>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <center>{{ $users->links() }}</center>
</section>
@if(session('message'))
  <script type="text/javascript">
    Materialize.toast("{{session('message')}}", 4000);
  </script>
@endif
@endsection
