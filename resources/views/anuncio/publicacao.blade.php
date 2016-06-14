@extends('layouts.inside')

@section('content')

<div class="col-lg-12 content-right">
  <ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/categoria">Categorias</a></li>
    <li><a href="/categoria/{{$anuncio->codc}}">{{$categoria->nomec}}</a></li>
    <li>{{$anuncio->tituloa}}</li>
  </ol>

  @yield('publicacaosuccess')
  @if(count($errors) > 0)
    <div class='alert alert-danger'>
      <ul class='list-unstyled'>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">
    <div class="col-xs-12">
      <h2 class='pull-left'>{{$anuncio->tituloa}}</h2>
      <a href='{{url("denuncia/anuncioid=".$anuncio->id)}}' class='btn navbar-btn pull-right'>denunciar anúncio</a>
    </div>
  </div>
  <div class="row">
		<div class="col-md-7">
			<div id="carousel-detail-classified" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-detail-classified" data-slide-to="0" class="active"></li>
					@if($anuncio->imagem2)
            <li data-target="#carousel-detail-classified" data-slide-to="1"></li>
          @endif
					@if($anuncio->imagem3)
            <li data-target="#carousel-detail-classified" data-slide-to="2"></li>
          @endif
					@if($anuncio->imagem4)
            <li data-target="#carousel-detail-classified" data-slide-to="3"></li>
          @endif
          @if($anuncio->imagem5)
            <li data-target="#carousel-detail-classified" data-slide-to="4"></li>
          @endif
				</ol>
			  <div class="carousel-inner">



          @if(!($anuncio->imagem1 || $anuncio->imagem2 || $anuncio->imagem3 ||
                $anuncio->imagem4 || $anuncio->imagem5))
                <img src="{{url('/img/anuncioplaceholder.svg')}}" class="img-responsive">
          @endif

          @if($anuncio->imagem1)
            <div class="item active tamimg">
              <img src="{{url('/img/anuncio/'.$anuncio->imagem1)}}" class="img-responsive">
            </div>
          @endif
          @if($anuncio->imagem2)
            <div class="item active tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem2}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem3)
            <div class="item active tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem3}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem4)
            <div class="item active tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem4}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem5)
            <div class="item active tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem5}}" class="img-responsive" />
  					</div>
          @endif

				</div>
				<a class="left carousel-control" href="#carousel-detail-classified" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-detail-classified" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
  	<div class="col-md-5">
  		<table class="table table-condensed table-hover">
  		  <thead>
  				<th colspan="2">Detalhes:</th>
  			</thead>
  			<tbody style="font-size: 15px;">
          @if($anuncio->tipo == 'p')
          <tr>
            <td>Quantidade de itens</td>
            <td>{{$anuncio->qtitens}}</td>
          </tr>
          <tr>
  					<td>Condição</td>
  					<td>
              @if($anuncio->condicao == 'n')
                Produto novo
              @else
                Produto usado
              @endif
            </td>
  				</tr>
          @endif
  				<tr>
  					<td>Categoria</td>
  					<td>{{$categoria->nomec}}</td>
  				</tr>
  				<tr>
  					<td>Métodos de Pagamento</td>
  					<td>Boleto, etc etc</td>
  				</tr>
  			</tbody>
  		</table>
      <div class='col-md-12' style='text-align: center'><h3 style='margin-top: 0'>R${{number_format($anuncio->valor, 2, ',', '.')}}</h3></div>
      <div class='col-md-8 col-md-offset-2'>
        <a href="#msg" class="btn btn-success btn-block">Tenho Interesse!</a>
      </div>
  		<div class="row">
  			<div class="col-md-12">
  				<div style="padding: 5px; font-weight: bold;">Anunciante:</div>
  				<div class="well">
  					<div class="row">
  						<div class="col-sm-12">
  							<h4>{{$vendedor->nome}}</h4>
  							<span class="glyphicon glyphicon-map-marker" title="Location"></span>
                  {{$vendedor->bairro}}, {{$vendedor->cidade}}, {{$vendedor->estado}}<br />
  							<span class="glyphicon glyphicon-envelope" title="E-mail"></span>
                  {{$vendedor->email}}<br />
  							<span class="glyphicon glyphicon-phone-alt" title="Telephone"></span>
                  {{$vendedor->tel1}}<br />
  						</div>
  					</div>
          </div>
  			</div>
  		</div>
  	</div>
  </div>
	<div class="row">
		<div class="col-md-12">
      <div class="panel" style="border-color: #ccc">
    		<div class="panel panel-heading">
          <h4>Descrição</h4>
        </div>
        <div class="panel-body">
    			<p style="text-align: justify;">{{$anuncio->descricao}}</p>
        </div>
      </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4 id='msg'>Enviar mensagem de interesse ao vendedor</h4>
			<div class="panel panel-default">
				<div class="panel-body">
					{!! Form::open() !!}
            <input type="hidden" name="emaila" value="{{$anuncio->emaila}}">
            <input type="hidden" name="emaili" value="{{Auth::user()->email}}">
						<div class="form-group">
							<label for="msg">Deixe sua mensagem abaixo: </label>
							<textarea class="form-control" id="msg" name="msg" placeholder="Escreva aqui sua mensagem" rows="5"></textarea>
						</div>
						<button class="btn btn-info" type="submit">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
  <div class='row'>

  </div>
</div>



@endsection
