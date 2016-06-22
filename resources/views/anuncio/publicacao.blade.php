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
  @if(Session::has('interesse_sucesso'))
    <div class='alert alert-success'>
      {{session('interesse_sucesso')}}
    </div>
  @endif
  @if(Session::has('coment_sucesso'))
    <div class='alert alert-success'>
      {{session('coment_sucesso')}}
    </div>
  @endif
  @if(Session::has('edit_sucesso'))
    <div class='alert alert-success'>
      {{session('edit_sucesso')}}
    </div>
  @endif
  <div class="row">
    <div class="col-xs-12">
      <h2 class='pull-left'>{{$anuncio->tituloa}}</h2>
      <ul class='list-inline pull-right'>
        @if(Auth::check() && $anuncio->emaila==Auth::user()->email)
          <li class='list-inline-item'>
            <a href='{{url("anuncio/editar/".$anuncio->id)}}' class='btn navbar-btn'>
              editar anúncio <i class='fa fa-pencil'></i>
            </a>
          </li>
        @endif
        <li class='list-inline-item'>
          <a href='{{url("denuncia/anuncioid=".$anuncio->id)}}' class='btn navbar-btn'>
            denunciar anúncio <i class='fa fa-ban text-danger'></i>
          </a>
        </li>

    </div>
  </div>
  <div class="row">
		<div class="col-md-7">
      <div class="slider">
        @if($anuncio->imagem1)
        	<input type="radio" name="slide_switch" id="id1" checked/>
        	<label for="id1">
        		<img src="{{url('img/anuncio/'.$anuncio->imagem1)}}" width="100"/>
        	</label>
        	<img src="{{url('img/anuncio/'.$anuncio->imagem1)}}" class="imgslider"/>
        @endif
        @if($anuncio->imagem2)
      	  <input type="radio" name="slide_switch" id="id2"
          @if(!$anuncio->imagem1)
            checked
          @endif/>
        	<label for="id2">
        		<img src="{{url('img/anuncio/'.$anuncio->imagem2)}}" width="100"/>
        	</label>
        	<img src="{{url('img/anuncio/'.$anuncio->imagem2)}}" class="imgslider"/>
        @endif
        @if($anuncio->imagem3)
      	  <input type="radio" name="slide_switch" id="id3"
          @if(!$anuncio->imagem1 && !$anuncio->imagem2)
            checked
          @endif/>
        	<label for="id3">
        		<img src="{{url('img/anuncio/'.$anuncio->imagem3)}}" width="100"/>
        	</label>
        	<img src="{{url('img/anuncio/'.$anuncio->imagem3)}}" class="imgslider"/>
        @endif
        @if($anuncio->imagem4)
      	  <input type="radio" name="slide_switch" id="id4"
          @if(!$anuncio->imagem1 && !$anuncio->imagem2 && !$anuncio->imagem3)
            checked
          @endif/>
        	<label for="id4">
        		<img src="{{url('img/anuncio/'.$anuncio->imagem4)}}" width="100"/>
        	</label>
        	<img src="{{url('img/anuncio/'.$anuncio->imagem4)}}" class="imgslider"/>
        @endif
        @if($anuncio->imagem5)
      	  <input type="radio" name="slide_switch" id="id5"
          @if(!$anuncio->imagem1 && !$anuncio->imagem2 && !$anuncio->imagem3 && !$anuncio->imagem4)
            checked
          @endif/>
        	<label for="id5">
        		<img src="{{url('img/anuncio/'.$anuncio->imagem5)}}" width="100"/>
        	</label>
        	<img src="{{url('img/anuncio/'.$anuncio->imagem5)}}" class="imgslider"/>
        @endif
        @if(!($anuncio->imagem1 || $anuncio->imagem2 || $anuncio->imagem3 ||
              $anuncio->imagem4 || $anuncio->imagem5))
          <input type="radio" name="slide_switch" id="id1" checked="checked"/>
        	<label for="id1">
        		<img src="{{url('img/anuncioplaceholder.svg')}}" width="100"/>
        	</label>
        	<img src="{{url('img/imageplaceholder.png')}}" height=100% class="imgslider"/>
        @endif
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
            <td>Visualizações do anúncio</td>
            <td>{{$anuncio->qtvisit}}</td>
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
  					<td>Método de Pagamento</td>
  					<td>{{$pagamento->nomep}}</td>
  				</tr>
          @if($anuncio->tipo == 'p')
            <tr>
              <td>Unidades à venda</td>
              <td>{{$anuncio->qtitens}}</td>
            </tr>
          @endif
  			</tbody>
  		</table>
      <div class='col-md-12' style='text-align: center'><h3 style='margin-top: 0'>R${{number_format($anuncio->valor, 2, ',', '.')}}</h3></div>
      <div class='col-md-8 col-md-offset-2'>
        <a href="#msg" class="btn btn-success btn-block" onclick='document.getElementById("mensagem").focus()'>Tenho Interesse!</a>
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
		<div class="col-md-7">
      <div class="panel" style="border-color: #ccc; min-height: 250px">
    		<div class="panel panel-heading">
          <h4>Descrição</h4>
        </div>
        <div class="panel-body">
    			<p style="text-align: justify;">{{$anuncio->descricao}}</p>
        </div>
      </div>
		</div>
		<div class="col-md-5">
			<div class="panel" style="border-color: #ccc">
        <div class='panel panel-heading'>
          <h4 id='msg'>Enviar mensagem de interesse ao vendedor</h4>
        </div>
				<div class="panel-body">
					{!! Form::open() !!}
            <input type="hidden" name="id" value='{{$anuncio->id}}'>
            <input type="hidden" name="emaila" value='{{$anuncio->emaila}}'>
            <input type="hidden" name="emaili"
              @if(Auth::guest()) value=''
              @else value='{{Auth::user()->email}}'
              @endif>
						<div class="form-group">
							<textarea class="form-control" value='{{old("msg")}}'id="mensagem" name="msg" placeholder="Escreva aqui sua mensagem" rows="3"></textarea>
						</div>
						<button class="btn btn-info" type="submit">Enviar</button>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
  <div class='row'>
    <div class="col-md-10 col-md-offset-1">
			<h3 id='cmm'>{{count($comentarios)}} Comentários</h4>
				{!! Form::open(['url'=>'anuncio/'.$anuncio->id.'/comentar']) !!}
        <div class='row'>
          <input type="hidden" name="id" value='{{$anuncio->id}}'>
          <input type="hidden" name="emailc"
            @if(Auth::check())
              value='{{Auth::user()->email}}'
            @endif
          >
          <div class='col-sm-9 col-xs-8'>
            <input type='text' class='form-control' id="msg" name="msg" placeholder="Escreva aqui seu comentário">
          </div>
          <div class='col-sm-2 col-xs-3'>
					  <button class="btn btn-block btn-success" type="submit">Enviar</button>
          </div>
        </div>
				{!!Form::close()!!}

  		<div class="panel-body">
  			@if(count($comentarios) > 0)
          @foreach(array_slice($comentarios, 0, 5) as $cmm)
            <h4>{{$cmm->nome}}<small>enviado em {{$cmm->created_at}}</small></h4>
            <p>{{$cmm->msg}}</p>
            <hr>
          @endforeach
        @else
          <div class="well">
            Ainda não foram feitos comentários neste anúncio.
          </div>
        @endif
  		</div>
    </div>
  </div>
</div>

<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
@endsection
