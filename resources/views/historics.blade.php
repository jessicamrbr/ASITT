@extends('header')
@section('titleIcon', "error_outline")
@section('titleName', "Alterações em filas")
@section('containerPage')
   <section id="cd-timeline">
      <table>
         <thead>
            <tr>
               <th>Justificativa de alteração*</th>
               <th>Momento</th>
            </tr>
         </thead>
         <tbody>
            @foreach($historics as $historic)
               <tr>
                  <td>{{$historic->detail}}</td>
                  <td>{{date('d/m/Y', strtotime($historic->moment))}}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
      <div>
         <h6 class="right-align">* Motivo pelo qual outro(a) paciente precisou ultrapassar com urgência sua posição na fila.</h6>
      </div>
   </section>
@endsection
