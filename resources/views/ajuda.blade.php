@extends('layouts.header')

@section('body')
  <div class='row'>
    @if(Session::has('ajuda_sucesso'))
      <div class='alert alert-success'>
        {{session('ajuda_sucesso')}}
      </div>
    @endif
    <div class='col-md-8'>
      <div class='panel panel-default'>
        <div class='panel-heading panel-title'>Ajuda</div>
        <div class='panel-body'>
          <h3>Perguntas frequentes</h3>

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class='label label-success'>+</span> Como faço para adicionar um classificado no site?
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <p>
                    No menu superior, clique em "Publicar anúncio".<br>
                    Você será redirecionado para um formulário com todos os campos
                    para você adicionar o seu classificado, inclusive com a adição
                    de até 5 imagens.
                  </p>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class='label label-success'>+</span> Como enviar uma mensagem de interesse a um anunciante?
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <p>
                    É muito simples. Basta abrir o anunciado desejado e clicar no botão
                    "Tenho Interesse", que lhe redirecionará um pouco para baixo da
                    página onde está localizada a caixa de texto para você escrever sua
                    mensagem.
                  </p>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span class='label label-success'>+</span> Como funcionam os anúncios patrocinados?
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <p>
                    No momento em que você adiciona um anúncio, há no formulário
                    uma opção que, caso marcada, indica que vocẽ deseja que
                    aquele anúncio seja patrocinado. Quando você publicar o anúncio,
                    aparecerá um botão para gerar um boleto. Imprima o boleto, pague
                    em qualquer banco em até 10 dias e o seu classificado já estará
                    entre os destaques do Chapecó Classificados.
                  </p>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <span class='label label-success'>+</span> Como altero meu endereço de e-mail?
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  <p>
                    Para alterar o e-mail de acesso à conta, você deve entrar em
                    contato com o Chapecó Classificados.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='panel panel-default'>
        <div class='panel-heading panel-title'>
          Contato
        </div>
        <div class='panel-body'>
          <p>Teve algum problema com o site? As dúvidas persistem? Entre em contrato
          conosco e iremos resolver os seus problemas!</p>
          {!! Form::open() !!}
            @if($errors->has('nome'))
              <div class='form-group has-error'>
                <input type='text' name='nome' placeholder="Nome completo" class='form-control' />
                <span class='help-block'>preencha o campo nome</span>
              </div>
            @else
              <input type='text' name='nome' placeholder="Nome completo" class='form-control' />
            @endif

            @if($errors->has('email'))
              <div class='form-group has-error'>
                <input type='email' name='email' placeholder="E-mail para contato" class='form-control' />
                <span class='help-block'>preencha o campo e-mail</span>
              </div>
            @else
              <input type='email' name='email' placeholder="E-mail para contato" class='form-control' />
            @endif
            @if($errors->has('msg'))
              <div class='form-group has-error'>
                <textarea name='msg' placeholder="Escreva a sua mensagem aqui" class='form-control' rows='4'></textarea>
                <span class='help-block'>preencha o campo mensagem</span>
              </div>
            @else
              <textarea name='msg' placeholder="Escreva a sua mensagem aqui" class='form-control' rows='4'></textarea>
            @endif
            <input type='submit' class='btn btn-success'>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
