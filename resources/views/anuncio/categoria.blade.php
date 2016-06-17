@extends('layouts.inside')

@section('content')
<div class='row'>
  <div class='col-md-10 col-md-offset-1 col-lg-offset-0 col-lg-12'>
    @foreach($categorias as $cat)
      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <a href="{{url('categoria/'.$cat->codc)}}" class="thumbnail catdiv">
            <img src="img/categoria/{{$cat->foto}}" alt="..." class='catimg'>
          <h4>{{$cat->nomec}}</h4>
        </a>
      </div>
    @endforeach
  </div>
</div>

@endsection
