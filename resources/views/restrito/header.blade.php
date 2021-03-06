<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
      unset($_SESSION['login']);
	    unset($_SESSION['senha']);
      header('location:login.blade.php');
    }else{
      $logado = $_SESSION['login'];
    }
  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Classificados Chapecó</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
            background-color: #ccc;
            padding-top: 70px;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .tamimg {
          width:100%;
          height: 400px !important;
        }
        a, a:hover, a:visited {
          color: #fff;
          text-decoration: none;
        }
        .indexlink, .indexlink:hover, .indexlink:visited {
          color: #000;
          text-decoration: none;
        }
    </style>
</head>
<body id="app-layout">
  <div class='container'>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class='container'>
        <div class='navbar-brand'>
          <a href='{{url('restrito')}}'>Área restrita Chapecó Classificados</a>
        </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ccrest">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="ccrest">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="{{url('restrito/usuarios')}}">Usuários</a>
            </li>
            <li class="dropdown">
              <a href="{{url('restrito/anuncios')}}">Anúncios</a>
            </li>
            <li class="dropdown">
              <a href="{{url('restrito/denuncias')}}">Denúncias </a>
            </li>
            <li class="list-unstyled">
              <p class='text-success'><small>logado como {{$logado}}</small><br><a href='{{url('restrito/logout')}}'>Sair</a></p>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @yield('body')
  </div>
  <footer>

  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
