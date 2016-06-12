@extends('layouts.app')

@section('content')
<div class='col-lg-9 content-left'>
  <h4>Perfil de {{ Auth::user()->nome }}</h4>

  <div class="panel panel-default">
    <div class="panel-heading">
      Visão geral
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-3">
          <div class='panel panel-heading'>
            <strong>Foto de perfil</strong>
          </div>
          {!!
            Image::rounded('/img/perfil/'.Auth::user()->email)->responsive()
          !!}
          @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                {{$error}}
              @endforeach
            </div>
          @endif
          {!!
            Form::open(['files'=>true, 'url' => 'perfil/fotoperfil']),
              Form::file('fotoperfil', ['class' => 'file']),
              Form::submit('Alterar foto'),
            Form::close()
          !!}


          </form>
        </div>
        <div class="col-sm-9">
          <div class='panel panel-heading'>
            <strong>Informações</strong> | <a href='perfil/editar'>editar perfil</a>
          </div>
          <table class="table table-striped table-hover">
            <tr>
              <td>Nome</td>
              <td><strong>{{Auth::user()->nome}}</strong></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td><strong>{{Auth::user()->email}}</strong></td>
            </tr>
            <tr>
              <td>
                @if(Auth::user()->tel2)
                  Telefone 1
                @else
                  Telefone
                @endif
              </td>
              <td>
                <strong>
                {{Auth::user()->tel1}}
                </strong>
              </td>
            </tr>
            @if(Auth::user()->tel2)
              <tr>
                <td>Telefone 2</td>
                <td>
                  <strong>
                    {{Auth::user()->tel2}}
                  </strong>
                </td>
              </tr>
            @endif
            <tr>
              <td>Endereço</td>
              <td>
                <strong>
                {{Auth::user()->bairro}},
                {{Auth::user()->cidade}}
                -
                {{Auth::user()->estado}}
                </strong>
              </td>
            </tr>
            <tr>
              <td>
                Cadastrado desde
              </td>
              <td>
                <strong>
                {{Auth::user()->created_at}}
                </strong>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer">
    </div>
  </div>
</div>

@endsection
