@extends('layouts.app')

@section('content')
<!-- <div class="container-fluid">
	<div class="row"> -->
		<div class="col-md-9">

			@yield('after_register')

			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<div class='row'>
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						{!!
						Form::open(['class'=>'col-sm-6 col-sm-offset-3']),
							ControlGroup::generate(
								Form::label('email','E-mail',['class'=>'col-xs-4 control-label']),
								Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'email@exemplo.com'])
							),
							ControlGroup::generate(
								Form::label('password','Senha',['class'=>'col-xs-4 control-label']),
								Form::password('password', ['class'=>'form-control', 'placeholder'=>'*******'])
							),
							ControlGroup::generate(
								Form::checkbox('remember', 1,null,['class'=>'col-xs-1']),
								Form::label('remember','Lembrar-me')
							),
							Form::submit(
                'Login',
                ['class'=>'btn btn-success']
              )
						!!}
						<div class='pull-right'>
							<a href="{{url('/password/email')}}">Esqueceu sua senha?</a>
						</div>
						{!!	Form::close() !!}
					</div>
					<hr>
					<div class='row'>
						<div class='well col-sm-6 col-sm-offset-3'>
							Não tem uma conta? <a href='{{url("register")}}'>Crie uma nova</a>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--	</div>
</div> -->
@endsection
