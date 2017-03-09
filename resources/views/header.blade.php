<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name') }}</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      {!! MaterializeCSS::include_full() !!}
      @yield('optCss')
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <script>
         window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
      </script>
   </head>
   <body>
      <header class="white">
         <div id="topRow" class="row">
            <div class="col s5 m2">
               <img id="topLogo" class="responsive-img" src="{{ $url = asset('img/logo.png') }}">
            </div>
            <div class="col s1 m2"></div>
            <div class="col s6 m4">
               <div >
                  <h5 class="flow-text center-align">
                     <a href="{{ (Auth::check()) ? url('/resume') : url('/') }}" class="black-text">
                        Ambulatório de saúde integral para travestis e transexuais
                     </a>
                  </h5>
               </div>
            </div>
            <div class="col m2 hide-on-med-and-down"></div>
            @if (Route::has('login'))
               @if (Auth::check())
                  <div class="col m2 hide-on-med-and-down">
                     <div class="card horizontal">
                        <div class="card-image">
                           <i class="medium material-icons">person</i>
                        </div>
                        <div class="card-stacked">
                           <div id="topUserCardName" class="card-content">
                              <div class="truncate" style="width:130px;">{{ Auth::user()->name }}</div>
                              <div class="truncate" style="width:130px;">{{ Auth::user()->id }}</div>
                           </div>
                           <div id="topUserCardId" class="card-action">
                              <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                 Sair
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               @else
                  @if (Request::path() != 'login')
                     <div class="col s12 m2 center">
                        <a href="{{ url('/login') }}" class="btn waves-effect waves-light transColor" style="margin-top:10px;">
                           Acessar
                        </a>
                     </div>
                  @endif
               @endif
            @endif
         </div>
         @if (Route::has('login'))
            @if (Auth::check())
               <div id="top-navigation-bar-main">
                  <nav id="mainNav" class="transColor">
                     <div class="nav-wrapper">
                        <a href="/resume" id="topUserLblName" class="brand-logo truncate hide-on-med-and-up">{{ Auth::user()->name }}</a>
                        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                        @can ('admPrivilege')
                           <ul id="dropdown-desk" class="dropdown-content">
                              <li><a href="/admin/ranks">
                                 <i class="medium material-icons left">linear_scale</i> Gerênciar filas
                                 </a></li>
                              <li><a href="/admin/rank/new">
                                 <i class="medium material-icons left">add_circle_outline</i> Nova fila
                                 </a></li>
                              <li><a href="/admin/publication/new">
                                 <i class="medium material-icons left">insert_drive_file</i> Nova publicação
                                 </a></li>
                              <li><a href="/admin/users">
                                 <i class="medium material-icons left">people</i> Gerênciar usuários
                                 </a></li>
                              <li><a href="/admin/user/new">
                                 <i class="medium material-icons left">person_add</i> Novo usuário
                                 </a></li>
                           </ul>
                        @endcan
                        <ul id="nav-desk" class="left hide-on-med-and-down">
                           <li><a href="/resume">
                              <i class="medium material-icons left">assessment</i> Meu resumo
                              </a></li>
                           <li><a href="/timeline">
                              <i class="medium material-icons left">history</i> Minha linha do tempo
                              </a></li>
                           <li><a href="/publications">
                              <i class="medium material-icons left">description</i> Publicações
                              </a></li>
                           <li><a href="/historics">
                              <i class="medium material-icons left">error_outline</i> Alterações em filas
                              </a></li>
                           <li><a href="/user/edit">
                              <i class="medium material-icons left">account_box</i> Meu perfil
                              </a></li>
                           @can ('admPrivilege')
                              <li><a id="dropdown-button-desk" href="#!" data-activates="dropdown-desk">
                                 <i class="medium material-icons left">more_vert</i> Administração<i class="material-icons right">arrow_drop_down</i></a></li>
                           @endcan
                        </ul>
                        @can ('admPrivilege')
                           <ul id="dropdown-mobile" class="dropdown-content">
                              <li><a href="/admin/ranks">
                                 <i class="medium material-icons left">linear_scale</i> Gerênciar filas
                                 </a></li>
                              <li><a href="/admin/rank/new">
                                 <i class="medium material-icons left">add_circle_outline</i> Nova fila
                                 </a></li>
                              <li><a href="/admin/publication/new">
                                 <i class="medium material-icons left">insert_drive_file</i> Nova publicação
                                 </a></li>
                              <li><a href="/admin/users">
                                 <i class="medium material-icons left">people</i> Gerênciar usuários
                                 </a></li>
                              <li><a href="/admin/user/new">
                                 <i class="medium material-icons left">person_add</i> Novo usuário
                                 </a></li>
                           </ul>
                        @endcan
                        <ul id="nav-mobile" class="side-nav">
                           <li><a href="/resume">
                              <i class="material-icons left">assessment</i> Meu Resumo
                              </a></li>
                           <li><a href="/timeline">
                              <i class="material-icons left">history</i> Minha linha do tempo
                              </a></li>
                           <li><a href="/publications">
                              <i class="material-icons left">description</i> Publicações
                              </a></li>
                           <li><a href="/historics">
                              <i class="medium material-icons left">error_outline</i> Alterações em filas
                              </a></li>
                           <li><a href="/user/edit">
                              <i class="material-icons left">account_box</i> Meu perfil
                              </a></li>
                           @can ('admPrivilege')
                              <li><a id="dropdown-button-mobile" href="#!" data-activates="dropdown-mobile">
                                 <i class="material-icons left">more_vert</i> Administração<i class="material-icons right">arrow_drop_down</i>
                                 </a></li>
                           @endcan
                           <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="material-icons left">exit_to_app</i> Sair
                              </a></li>
                        </ul>
                     </div>
                  </nav>
               </div>
            @endif
         @endif
      </header>
      <main>
         @if (Route::has('login'))
            @if (Auth::check())
            <div class="container">
               <h3><i class="medium material-icons left">@yield('titleIcon')</i> @yield('titleName')</h3>
               @yield('containerPage')
            </div>
            @else
               @yield('containerPageHome')
            @endif
         @endif
      </main>
      <footer id="mainFooter" class="page-footer transColor">
         <div class="footer-copyright">
            <div class="container">
               © 2017 Todos os direitos reservados
               <a class="white-text right" href="#!">Desenvolvido por Jéssica Moura</a>
            </div>
         </div>
      </footer>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
      </form>
      <script type="text/javascript">
         $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $("#dropdown-button-desk").dropdown();
            $("#dropdown-button-mobile").dropdown();
         });

         $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();
            if (scroll > $('#topRow').height()) {
               $('#top-navigation-bar-main').addClass('fixed-menu-viewport');
            } else if (scroll<100) {
               $('#top-navigation-bar-main').removeClass('fixed-menu-viewport');
            }
         });
      </script>
   </body>
</html>
