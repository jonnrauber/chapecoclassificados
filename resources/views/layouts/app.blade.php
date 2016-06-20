@extends('layouts.header')
<?php $categorias = DB::table('categorias')->orderBy('nomec')->get(); ?>

  @section('body')

      <div class="row">
      	<div class="col-md-3">
          <div class='row'>
            <div class='col-md-12'>
            	<div class="well well-sm">
          			{!!Form::open(['url' => 'pesquisa', 'method' => 'GET']) !!}
          				<div class="input-group">
          					<input type="text" class="form-control" placeholder="Procurando alguma coisa?" name="titulo">
          					<span class="input-group-btn">
          						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          					</span>
          				</div>
          			</form>
          		</div>
            </div>
          </div>

          <div class='row'>
            <div class='col-md-12'>
          		<div class="list-group">
                  <a href="{{url('categoria/destaques')}}" class="list-group-item destaques"><span class="glyphicon glyphicon-chevron-right"></span>
                    <span class='destaquestext'>Destaques!</span>
                  </a>
                  @foreach($categorias as $cat)
                    <a href="{{url('categoria/'.$cat->codc)}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span>
                      {{$cat->nomec}}
                    </a>
                  @endforeach
          		</div>
            </div>
          </div>
      		@yield('menu-left')
        </div>
        @yield('content')
      </div>
  @endsection
