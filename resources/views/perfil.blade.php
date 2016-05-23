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
            Image::rounded('http://placehold.it/200x200')->responsive()
          !!}
        </div>
        <div class="col-sm-9">
          <div class='panel panel-heading'>
            <strong>Informações</strong>
          </div>
          <table class="table table-striped table-hover">
            <tr>
              <td>Nome</td>
              <td>{{Auth::user()->nome}}</td>
              <td><a href='#'>alterar</a></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td>{{Auth::user()->email}}</td>
              <td><a href='#'>alterar</a></td>
            </tr>
            <tr>
              <td>Senha</td>
              <td>********</td>
              <td><a href='#'>alterar</a></td>
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
                {{Auth::user()->tel1}}
              </td>
              <td><a href='#'>alterar</a></td>
            </tr>
            @if(Auth::user()->tel2)
              <tr>
                <td>Telefone 2</td>
                <td>{{Auth::user()->tel2}}</td>
                <td><a href='#'>alterar</a></td>
              </tr>
            @endif
            <tr>
              <td>Endereço</td>
              <td>
                {{Auth::user()->bairro}},
                {{Auth::user()->cidade}}
                -
                {{Auth::user()->estado}}
              </td>
              <td><a href='#'>alterar</a></td>
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
