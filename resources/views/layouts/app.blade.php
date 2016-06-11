@extends('layouts.header')

  @section('body')

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
@endsection
