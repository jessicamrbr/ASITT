@extends('header')
@section('titleIcon', "assessment")
@section('titleName', "Meu Resumo")
@section('containerPage')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  
  <div class="row">
    <div class="col s12 m8 z-depth-4">
      <h5>
        Filas
      </h5>
      <div style="max-width:100%;">
        <div id="poll_div"></div>
        @barchart('Votes', 'poll_div')
      </div>
    </div>
    <div class="col m1"></div>
    <div class="col s12 m3 grey lighten-3 z-depth-4">
      <h5>
        Estimativas
      </h5>
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Profissionais</div>
          <div class="collapsible-body">
            <div class="collection">
              @foreach($rks_mt_tags as $rk_mt_tags)
                <a href="#!" class="collection-item truncate">
                  <span class="new badge" data-badge-caption="">
                    {{$rk_mt_tags->professionals_quantity}}
                  </span>
                  {{$rk_mt_tags->name}}
                </a>
              @endforeach
            </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">assignment_turned_in</i>Atendimentos</div>
          <div class="collapsible-body">
            <blockquote class="blue-text text-darken-2">
                (Média de novos atendimentos por semana.)
            </blockquote>
            <div class="collection">
              @foreach($rks_mt_tags as $rk_mt_tags)
                <a href="#!" class="collection-item truncate">
                  <span class="new badge" data-badge-caption="">
                    {{$rk_mt_tags->appointments_average}}
                  </span>
                  {{$rk_mt_tags->name}}
                </a>
              @endforeach
            </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">face</i>Usuários aguardando</div>
          <div class="collapsible-body">
            <div class="collection">
              @foreach($rks_total as $rk_total)
                <a href="#!" class="collection-item truncate">
                  <span class="new badge" data-badge-caption="">
                    {{$rk_total->total}}
                  </span>
                  {{$rk_total->ranks_meta_tag->name}}
                </a>
              @endforeach
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
@endsection
