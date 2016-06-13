@extends('layouts.app')

@section('menu-left')
	<div class="hidden-xs hidden-sm hidden-md">
		<h4>Recentemente adicionados</h4>

			@foreach($recentes as $recente)
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
		<div class="hidden-xs hidden-sm">
				<div class="col-lg-11">
					{!!
						Carousel::named('example')->withContents([
						    [
						        'image' => '//lorempixel.com/800/400/city',
						        'alt' => 'something',
						    ],
						    [
						        'image' => '//lorempixel.com/800/400/people',
						        'alt' => 'something else',
						    ],
						])
					!!}
				</div>
			<h4>Recomendados</h4>
			<div class="row">
			@foreach($anuncios as $anuncio)
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
	</div>

@endsection
