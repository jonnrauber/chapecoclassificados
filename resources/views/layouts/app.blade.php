<!DOCTYPE html>
<html lang="en">
<head>
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
        }

        .fa-btn {
            margin-right: 6px;
        }
        .tamimg {
          width:100%;
          height: 400px !important;
        }
    </style>
</head>
<body id="app-layout">
  <div class="container wrapper">
			<nav class="navbar navbar-default cc-nav" role="navigation">
      <div class="banner">
       <a href="{{ url('/') }}">
          <img src="{{ url('img/master/logo.png') }}" alt="Chapecó Classificados" title="Chapecó Classificados" />
        </a>
        <h3>Classificados Chapecó</h3>
      </div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#czsale-navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="czsale-navbar">
          @if (!Auth::guest())
					<a href="{{ url('anuncio/novo')}}" class="btn btn-success navbar-btn navbar-left add-classified-btn" role="button">Publicar anúncio</a>
          <a href="{{ url('anuncio/interesses')}}" class="btn navbar-btn navbar-left">Meus negócios</a>
          @endif
          <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class='caret'></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('/') }}">Página Inicial</a></li>
								<li><a href="{{ url('anuncio/novo') }}">Adicionar Anúncio</a></li>
								<li><a href="{{ url('regras') }}">Regras & Termos de Uso</a></li>
								<li><a href="{{ url('ajuda') }}">Ajuda</a></li>
								@if (Auth::guest())
                  <li><a href="{{ url('register') }}">Registrar-se</a></li>
                @endif
							</ul>
						</li>
            @if (Auth::guest())
  						<li><a href="{{ url('register') }}">Registrar-se</a></li>
  						<li class="dropdown">
  							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrar <b class="caret"></b></a>
  							<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
  								<li>
  									<div class="row">
  										<div class="col-md-12">
                        @if($errors->any())
                          <div class="alert alert-danger">
                            E-mail ou senha incorretos.
                          </div>
                        @endif

  											{!!
  											Form::open(['url' => 'login']),
  												ControlGroup::generate(
  													Form::label('email', 'E-mail', ['class' => 'sr-only']),
  													Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email@exemplo.com', 'required' => ''])
  												),
  												ControlGroup::generate(
  													Form::label('senha', 'Senha', ['class' => 'sr-only']),
  													Form::password('senha', ['class' => 'form-control', 'placeholder' => '******', 'required' => ''])
  												),
                          ControlGroup::generate(
            								Form::checkbox('remember', 1,null,['class'=>'col-xs-1']),
            								Form::label('remember','Lembrar-me')
            							),
            							ControlGroup::generate(
            								Form::submit(
                              'Login',
                              ['class'=>'btn btn-success']
                            ),
            								Button::link('Esqueceu sua senha?', url('/password/email'))
            							),
  											Form::close()
  											!!}
  										</div>
  									</div>
  								</li>
  							</ul>
  						</li>
            @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <img src='/img/perfil/{{Auth::user()->email}}' class="img-rounded" height=27px width=27px>
                      {{ Auth::user()->nome }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/perfil') }}"><i class="fa fa-btn fa-user"></i>Perfil</a></li>
                    <li><a href="{{ url('anuncio/meusitens') }}"><i class="fa fa-btn fa-tags"></i>Anúncios</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                  </ul>
                </li>
            @endif
					</ul>
				</div>
			</nav>

      <div class="row content">
      	<div class="col-lg-3 content-left">
      		<div class="well well-sm">
      			{!!Form::open(['url' => 'pesquisa']) !!}
      				<div class="input-group">
      					<input type="text" class="form-control" placeholder="Procurando alguma coisa?" name="titulo">
      					<span class="input-group-btn">
      						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      					</span>
      				</div>
      			</form>
      		</div>
      		<!-- <div class="well well-sm hidden-lg">
      			<div class="mobile-categories"></div>
      		</div> -->
      		<div class="categories list-group">
      			  <a href="{{url('categoria/CAR')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Carros
              </a>
              <a href="{{url('categoria/MOT')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Motocicletas
              </a>
              <a href="{{url('categoria/CEL')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Celulares
              </a>
              <a href="{{url('categoria/PCS')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Notebooks & Computadores
              </a>
              <a href="{{url('categoria/ROU')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Roupas & Acessórios
              </a>
              <a href="{{url('categoria/OU')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                Outras Categorias
              </a>
      		</div>
      		@yield('menu-left')
        </div>
        @yield('content')
      </div>


      <footer>
				<div class="footer-content">
					<div class="row">
						<div class="col-xs-6">
						<!--
              <img src="img/czsale-logo.png" alt="CZSale" title="CZSale" style="width: 100px; height: 58px;" />
            -->
              <p><a href="{{ url('/') }}">Chapecó Classificados</a> | 2016 &copy;</p>
						</div>
						<div class="col-xs-6 text-right">
							<a href="help.html" class="btn btn-link">Ajuda</a>
							<span class="bar">|</span>
							<a href="contact.html" class="btn btn-link">Contato</a>
							<span class="bar">|</span>
							<a href="conditions.html" class="btn btn-link">Regras</a>
						</div>
					</div>
				</div>
			</footer>
		</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
