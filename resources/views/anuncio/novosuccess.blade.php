@extends('anuncio.novo')

@section('novosuccess')

  <div class="alert alert-success">
    <p>Anúncio cadastrado com sucesso.</p>
    @if($boleto)
      <p>Para que seu anúncio apareça entre os destaques, imprima o boleto abaixo e pague em qualquer banco até a data de vencimento:</p>
      {!!Form::open(['url' => 'anuncio/gera-boleto', 'target' => '_blank']) !!}
        <input type='hidden' value='{{Auth::user()->email}}' name='emaila'>
        <input type='submit' value='Gerar Boleto' class='btn btn-success'>
      {!!Form::close() !!}
    @endif
  </div>


<script>
</script>
@endsection
