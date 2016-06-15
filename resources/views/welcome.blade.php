@extends('layouts.app')

@section('menu-left')
	<div class="">
		<h4>Recentemente adicionados</h4>

			@foreach(array_slice($recentes, 0, 3) as $recente)
				<div class="media">
					<a class="pull-left" href="{{url('anuncio/'.$recente->id)}}">
						@if($recente->imagem1)
							<img class="media-object" style="max-width: 64px; height: auto;" src="{{url('/img/anuncio/'.$recente->imagem1)}}" />
						@else
							<img class="media-object" style="max-width: 64px; height: auto;" src="{{url('/img/peqanuncioplaceholder.png')}}" />
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
			<p class="text-right show-more"><a href="#">Mais &rarr;</a></p>
		</div>
@endsection


@section('content')
	<div class="col-lg-9 content-right">
		<div class="col-lg-11">
			{!!
				Carousel::named('home')->withContents([
				    [
				        'image' => 'img/master/home.fw.png',
				        'alt' => 'cadastrar',
				    ],
						[
				        'image' => 'img/master/homeauth.fw.png',
				        'alt' => 'publicar',
				    ],
				])
			!!}
		</div>
		<div class="col-lg-12">
			<hr>
			@foreach(array_slice($anuncios, 0, 8) as $anuncio)
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="thumbnail">
							<a href="{{url('anuncio/'.$anuncio->id)}}">
								@if($anuncio->imagem1)
									<img src="{{url('img/anuncio/'.$anuncio->imagem1)}}" />
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
