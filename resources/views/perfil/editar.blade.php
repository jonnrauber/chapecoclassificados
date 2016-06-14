@extends('layouts.app')


@section('content')
  <div class='col-lg-9 content-left'>
    <h4>Editando o perfil de {{ Auth::user()->nome }}</h4>

    <div class="panel panel-default">
      <div class="panel-heading">
        Visão geral
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-3">
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
              <a href="{{url('perfil')}}">cancelar</a> | <strong>Editar perfil</strong>
            </div>
            <table class="table table-hover">
              {!! Form::open() !!}
              <tr>
                <td>Nome</td>
                <td>
                  <strong>
                  {!! Form::text('nome', Auth::user()->nome, ['class'=>'form-control'])!!}
                  </strong>
                </td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td>
                  <strong>
                    {{Auth::user()->email}}
                  </strong>
                  <small>(verifique a Ajuda para alterar o endereço de e-mail)</small>
                </td>
              </tr>
              <tr>
                <td>Senha</td>
                <td>
                  <strong>
                    <a href='{{url("perfil/alterarsenha")}}'>alterar senha >></a>
                  </strong>
                </td>
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
                    {!! Form::tel('tel1', Auth::user()->tel1, ['class'=>'form-control']) !!}
                  </strong>
                </td>
              </tr>
              @if(Auth::user()->tel2)
                <tr>
                  <td>Telefone 2</td>
                  <td>
                    <strong>
                      {!! Form::tel('tel2', Auth::user()->tel2, ['class'=>'form-control']) !!}
                    </strong>
                  </td>
                </tr>
              @endif
              <tr>
                <td>Endereço</td>
                <td>
                  <strong>
                    {!!
                    ControlGroup::generate(
        							Form::label('estado','Estado', ['class'=>'control-label']),
        							Form::select('estado', ['selected' => Auth::user()->estado]),
        							null,
        							2,6
        						)
                    !!}
                    <br>
                    {!!
        						ControlGroup::generate(
        							Form::label('cidade', 'Cidade', ['class'=>'control-label']),
        							Form::select('cidade'),
        							null,
        							2,6
        						)
                    !!}
                    <br>
                    {!!
        						ControlGroup::generate(
        							Form::label('bairro', 'Bairro', ['class'=>'control-label']),
        							Form::text('bairro', Auth::user()->bairro, ['class'=>'form-control','placeholder'=>'ex: Passo dos Fortes']),
        							null,
        							2,5
        						)
                    !!}
                  </strong>
                </td>
              </tr>
            </table>
            <div class='col-xs-6 col-xs-offset-5'>
              {!!Form::submit('Atualizar dados', ['class'=>'btn btn-success btn-block'])!!}
            {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
      </div>
    </div>
  </div>


  <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
  <script type="text/javascript">
    window.onload = function() {
      new dgCidadesEstados(
          document.getElementById('estado'),
          document.getElementById('cidade'),
          true
      );
    }
  </script>
@endsection
