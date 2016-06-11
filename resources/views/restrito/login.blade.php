<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <title>Classificados Chapecó</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body background-color="BLACK">
  <div class='jumbotron'>
    <div class='container'>
      <div class='row'>
        <div class='col-xs-6 col-xs-offset-3'>
          <div class='panel panel-body'>
            <div class='col-xs-8 col-xs-offset-2'>
              <h2>RESTRITO</h2>
              {!! Form::open() !!}
              <input type='text' class='form-control' name='loginadm' placeholder="administrador" autocomplete="off">
              <input type='password' class='form-control' name='senhaadm' placeholder="**********" autocomplete="off">
              <input type='submit' value='Entrar' class='btn btn-danger'>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
