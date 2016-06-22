@extends('layouts.header')

@section('body')
  <div class='row'>
    <h3 style='text-align:center'>Regras & Termos de Uso</h3>
    <hr>
    <div class='col-md-10 col-md-offset-1'>
      <textarea name='regras' rows='20' class='form-control' readonly>{{file_get_contents('regras.txt')}}</textarea>
    </div>
  </div>
  <hr>
@endsection
