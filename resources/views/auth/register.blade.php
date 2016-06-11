@extends('layouts.app')

@section('content')
<!-- <div class="container-fluid">
	<div class="row"> -->

		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Novo Usuário</div>
				<div class="panel-body">
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
					Form::horizontal(),
						ControlGroup::generate(
							Form::label('nome','Nome', ['class'=>'control-label']),
							Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome completo']),
							null,
							4,6
						),
						ControlGroup::generate(
							Form::label('email','E-mail', ['class'=>'control-label']),
							Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'email@exemplo.com']),
							null,
							4,6
						),
						ControlGroup::generate(
							Form::label('senha','Senha', ['class'=>'control-label']),
							Form::password('senha', null, ['class'=>'form-control']),
							null,
							4,5
						),

						ControlGroup::generate(
							Form::label('senha_confirmation','Confirmar Senha', ['class'=>'control-label']),
							Form::password('senha_confirmation', null, ['class'=>'form-control']),
							null,
							4,5
						),
						ControlGroup::generate(
							Form::label('tel1','Telefone 1', ['class'=>'control-label']),
							Form::tel('tel1', null, ['class'=>'form-control', 'maxlength'=>'11', 'placeholder'=>'DDD XXXX YYYY']),
							null,
							4,4
						),
						ControlGroup::generate(
							Form::label('tel2','Telefone 2', ['class'=>'control-label']),
							Form::tel('tel2', null, ['class'=>'form-control', 'maxlength'=>'11', 'placeholder'=>'DDD XXXX YYYY']),
							null,
							4,4
						),
						ControlGroup::generate(
							Form::label('pais', 'País', ['class'=>'control-label']),
							Form::select('pais', [
								'BRA' => 'Brasil'
								]
							),
							null,
							4,2
						),
						ControlGroup::generate(
							Form::label('estado','Estado', ['class'=>'control-label']),
							Form::select('estado'),
							null,
							4,3
						),
						ControlGroup::generate(
							Form::label('cidade', 'Cidade', ['class'=>'control-label']),
							Form::select('cidade'),
							null,
							4,3
						),
						ControlGroup::generate(
							Form::label('bairro', 'Bairro', ['class'=>'control-label']),
							Form::text('bairro', null, ['class'=>'form-control','placeholder'=>'ex: Passo dos Fortes']),
							null,
							4,5
						),
						Form::submit('Cadastrar',['class'=>'col-md-offset-5 btn btn-primary']),
					Form::close()
					!!}

					<!-- Estado -->

				</div>
			</div>
		</div>

		<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
		<script type="text/javascript">
	    window.onload = function() {
	        new dgCidadesEstados(
	            document.getElementById('estado'),
	            document.getElementById('cidade'),
							true
						);
	    }
	</script>
<!--	</div>
</div> -->
@endsection
