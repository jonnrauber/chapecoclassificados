@extends('layouts.app')

@section('menu-left')
	<div class="col-xs-12">
		<h4>Recentemente adicionados</h4>

			@foreach(array_slice($recentes, 0, 4) as $recente)
				<div class="media recentes">
					<a class="pull-left" href="{{url('anuncio/'.$recente->id)}}">
						@if($recente->imagem1 || $recente->imagem2 || $recente->imagem3
								|| $recente->imagem4 || $recente->imagem5)
							@if($recente->imagem1)
								<img class="media-object" src="{{url('/img/anuncio/'.$recente->imagem1)}}" />
							@elseif($recente->imagem2)
								<img class="media-object" src="{{url('/img/anuncio/'.$recente->imagem2)}}" />
							@elseif($recente->imagem3)
								<img class="media-object" src="{{url('/img/anuncio/'.$recente->imagem3)}}" />
							@elseif($recente->imagem4)
								<img class="media-object" src="{{url('/img/anuncio/'.$recente->imagem4)}}" />
							@elseif($recente->imagem5)
								<img class="media-object" src="{{url('/img/anuncio/'.$recente->imagem5)}}" />
							@endif
						@else
							<img class="media-object" src="{{url('/img/peqanuncioplaceholder.png')}}" />
						@endif
					</a>
					<div class="media-body">
						<p>
							<a href="{{url('anuncio/'.$recente->id)}}"><strong>{{ $recente->tituloa }}</strong></a><br>
							{{$recente->descricao}}<br>
							<small>R${{number_format($recente->valor, 2, ',', '.')}}</small>
						</p>
					</div>
				</div>
			@endforeach
			<p class="text-right show-more"><a href="{{url('categoria/recentes')}}">Mais &rarr;</a></p>
		</div>
@endsection

@section('content')
	<div class="col-md-9">
		<div class='col-xs-12'>
			<div class="accordian">
				<ul>
					<li>
						<div class="image_title">
							<a href="#">Conheça</a>
						</div>
						<a href="#">
							<img src="{{url('img/master/homeauth.fw.png')}}"/>
						</a>
					</li>
					<li>
						<div class="image_title">
							<a href="#">Cadastre-se</a>
						</div>
						<a href="#">
							<img src="{{url('img/master/homeauth.fw.png')}}"/>
						</a>
					</li>
					<li>
						<div class="image_title">
							<a href="#">Anuncie</a>
						</div>
						<a href="#">
							<img src="{{url('img/master/home.fw.png')}}"/>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12">
			<hr>
				@foreach(array_slice($anuncios, 0, 12) as $anuncio)
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="thumbnail thumbhome">
							<a href="{{url('anuncio/'.$anuncio->id)}}">
								@if($anuncio->imagem1 || $anuncio->imagem2 || $anuncio->imagem3
										|| $anuncio->imagem4 || $anuncio->imagem5)
									@if($anuncio->imagem1)
										<img src="{{url('img/anuncio/'.$anuncio->imagem1)}}" />
									@elseif($anuncio->imagem2)
										<img src="{{url('img/anuncio/'.$anuncio->imagem2)}}" />
									@elseif($anuncio->imagem3)
										<img src="{{url('img/anuncio/'.$anuncio->imagem3)}}" />
									@elseif($anuncio->imagem4)
										<img src="{{url('img/anuncio/'.$anuncio->imagem4)}}" />
									@elseif($anuncio->imagem5)
										<img src="{{url('img/anuncio/'.$anuncio->imagem5)}}" />
									@endif
								@else
									<img src="{{url('img/peqanuncioplaceholder.png')}}" />
								@endif
							</a>
							<div class="caption">
								<h5><a href="{{url('anuncio/'.$anuncio->id)}}">{{$anuncio->tituloa}}</a></h5>
								<p>R${{number_format($anuncio->valor, 2, ',', '.')}}</p>
							</div>
						</div>
					</div>
			@endforeach
		</div>
	</div>

@endsection
