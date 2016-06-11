@extends('layouts.inside')

@section('content')
<div class='row'>
  <div class='col-md-10 col-md-offset-1'>
    @foreach($categorias as $cat)
      <div class="col-md-3">
        <a href="{{url('categoria/'.$cat->codc)}}" class="thumbnail">
          <img src="img/categoria/{{$cat->foto}}" alt="...">
          <h4>{{$cat->nomec}}</h4>
        </a>
      </div>
    @endforeach
  </div>
</div>

@endsection
