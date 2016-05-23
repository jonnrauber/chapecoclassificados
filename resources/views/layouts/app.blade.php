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
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
  <div class="container wrapper">
			<a href="{{ url('/') }}">
        <!--<img src="#" alt="Chapecó Classificados" title="Chapecó Classificados" />-->
        <h3>Chapecó Class</h3>
      </a>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#czsale-navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="czsale-navbar">
					<a href="{{ url('anuncios/novo')}}" class="btn btn-success navbar-btn navbar-left add-classified-btn" role="button">Publicar anúncio</a>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class='caret'></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('/') }}">Página Inicial</a></li>
								<li><a href="{{ url('anuncios/novo') }}">Adicionar Anúncio</a></li>
								<li><a href="{{ url('categorias') }}">Página de categorias</a></li>
								<li><a href="{{ url('regras') }}">Regras & Termos de Uso</a></li>
								<li><a href="{{ url('ajuda') }}">Ajuda</a></li>
								<li><a href="{{ url('contato') }}">Contato</a></li>
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
  								<li class="divider"></li>
  								<li>
  									<div class="form-group">
  										<button onclick="location.href='{{ url("auth/facebook") }}'" class="btn btn-info btn-block">Entrar com o Facebook</button>
  									</div>
  								</li>
  							</ul>
  						</li>
            @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->nome }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/perfil') }}"><i class="fa fa-btn fa-user"></i>Perfil</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
                </li>
            @endif
					</ul>
				</div>
			</nav>

      <div class="row content">
      	<div class="col-lg-3 content-left">
      		<h4>Pesquisa</h4>
      		<div class="well well-sm">
      			<form>
      				<div class="input-group">
      					<input type="text" class="form-control" placeholder="Procurando alguma coisa?">
      					<span class="input-group-btn">
      						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      					</span>
      				</div>
      			</form>
      		</div>
      		<h4>Categorias</h4>
      		<div class="well well-sm hidden-lg">
      			<div class="mobile-categories"></div>
      		</div>
      		<div class="categories list-group hidden-xs hidden-sm hidden-md">
      			<a href="#" class="list-group-item">Books <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Cameras & Photo <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Cell Phones & Accessories <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Clothing, Shoes & Accessories <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Computers & Networking <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">DVDs & Movies <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Health & Beauty <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Music <span class="glyphicon glyphicon-chevron-right"></span></a>
      			<a href="#" class="list-group-item">Toys & Hobbies <span class="glyphicon glyphicon-chevron-right"></span></a>
      		</div>
      		<div class="hidden-xs hidden-sm hidden-md">
      			<h4>Recentemente adicionados</h4>
      			<div class="newest-classifieds">
      				<div class="media">
      					<a class="pull-left" href="#">
      						<img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
      					</a>
      					<div class="media-body">
      						<p><a href="#"><strong>Samsung Galaxy S4</strong></a></p>
      						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
      					</div>
      				</div>
      				<div class="media">
      					<a class="pull-left" href="#">
      						<img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
      					</a>
      					<div class="media-body">
      						<p><a href="#"><strong>Vizio 60" Slim Frame 3D</strong></a></p>
      						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
      					</div>
      				</div>
      				<div class="media">
      					<a class="pull-left" href="#">
      						<img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
      					</a>
      					<div class="media-body">
      						<p><a href="#"><strong>Apple McBook Pro</strong></a></p>
      						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
      					</div>
      				</div>
      				<p class="text-right show-more"><a href="#">More &rarr;</a></p>
      			</div>
      		</div>
      	</div>
        @yield('content')
      </div>


      <div class="footer">
				<div class="footer-content">
					<div class="row">
						<div class="col-xs-6">
						<!--
              <img src="img/czsale-logo.png" alt="CZSale" title="CZSale" style="width: 100px; height: 58px;" />
            -->
              <h3>Chapecó Class</h3>
						</div>
						<div class="col-xs-6 text-right">
							<a href="help.html" class="btn btn-link">Ajuda</a>
							<span class="bar">|</span>
							<a href="contact.html" class="btn btn-link">Contato</a>
							<span class="bar">|</span>
							<a href="conditions.html" class="btn btn-link">Regras & condições</a>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
