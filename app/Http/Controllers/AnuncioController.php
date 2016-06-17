<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AnuncioRequest;
use Validator;
use DB;
use Auth;
use App\Anuncio;
use App\User;
use App\Categoria;
use Boleto;


class AnuncioController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function showAnuncioForm(){
    return view('anuncio.novo');
  }
  public function showMeusItensPage(){
    $anuncios = DB::select('
      select a.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      where a.emaila = ?', [Auth::user()->email]);
    return view('anuncio.meusitens', ['anuncios' => $anuncios]);
  }

  public function showEditarItemPage($id) {
    $anuncio = DB::select('
      select a.* from anuncios a
      where a.id = ?', [$id]);
    $anuncio = $anuncio[0];
    $categorias = DB::select('select c.codc, c.nomec from categorias c');
    return view('anuncio.editar', ['anuncio' => $anuncio, 'categorias'=>$categorias]);
  }

  public function editarAnuncio($id, AnuncioRequest $request) {
    $anuncio = Anuncio::find($id);

    $anuncio->emaila = Auth::user()->email;
    $anuncio->tituloa = $request->tituloa;
    $anuncio->descricao = $request->descricao;
    $anuncio->codc = $request->codc;
    $anuncio->valor = $request->valor;
    $anuncio->prior = false; //falta colocar a prioridade!
    $anuncio->tipo = $request->tipo;
    $anuncio->qtitens = $request->qtitens ? $request->qtitens : null;
    $anuncio->condicao = $request->condicao;

    $anuncio->save();
    return redirect('anuncio/'.$id);
  }

  public function deletaAnuncio($id) {
    $anuncio = Anuncio::find($id);
    $anuncio->delete();

    return redirect('anuncio/meusitens');
  }

  public function salvaImagemAnuncio($request, $campo, $num){
    if($request->hasFile($campo)) {
      $string = $request->file($campo)->getPathname();
      $nomeTemporario = substr($string, 8, strlen($string));
      $nome = $request->file($campo)->getClientOriginalName();
      $destino = base_path() . '/public/img/anuncio/';
      $nomearquivo = $nomeTemporario.Auth::user()->email.'_'.$num;
      $request->file($campo)->move($destino, $nomearquivo);
      return $nomearquivo;
    }
    return false;
  }

  private function geraBoletoPdf($request) {
    Boleto::sacado(array(
            'sacado'    => "Nome do seu Cliente",
            'endereco1' => "Endereço do seu Cliente",
            'endereco2' => "Cidade - Estado -  CEP: 00000-000"
        ));

     Boleto::cedente(array(
      'agencia'           => "1100", // Num da agencia, sem digito
      'agencia_dv'        => "0", // Digito do Num da agencia
      'conta'             => "0102003",     // Num da conta, sem digito
      'conta_dv'          => "4",
      'conta_cedente'     => "0102003", // ContaCedente do Cliente, sem digito (Somente Números)
      'conta_cedente_dv'  => "4", // Digito da ContaCedente do Cliente
      'carteira'          => "06",  // Código da Carteira: pode ser 06 ou 03
      'identificacao'     => "BoletoPhp - Código Aberto de Sistema de Boletos",
      'cpf_cnpj'          => "",
      'endereco'          => "Coloque o endereço da sua empresa aqui",
      'cidade_uf'         => "Cidade / Estado",
      'cedente'           => "Coloque a Razão Social da sua empresa aqui",
      'contrato'          =>  "12345678900"
    ));

    Boleto::banco('bradesco', array(
      'valor_boleto'          => '289,90', // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
      'nosso_numero'          => '789', //Num do pedido ou do documento = Nosso numero
      'numero_documento'      =>  '789', //// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
      'data_vencimento'       =>  date('d/m/Y'), //Data de emissão do Boleto
      'data_documento'        =>  date('d/m/Y'), //Data de processamento do boleto (opcional)
      'valor_unitario'        =>  '289,90',
      'demonstrativo1'        =>  "Pagamento de Compra na Loja Nonononono",
      'demonstrativo2'        =>  "Mensalidade referente a ...",
      'demonstrativo3'        =>  "Empresa- http://www.seusite.com.br",
      'instrucoes1'           =>  "- Sr. Caixa, cobrar multa de 2% após o vencimento",
      'instrucoes2'           =>  "- Receber atá 10 dias após o vencimento",
      'instrucoes3'           =>  "- Em caso de dúvidas entre em contato conosco: contato@seusite.com.br",

    ));

    //PARA GERAR O BOLETO EM PDF
    Boleto::pdf();
    return view('/');
  }

  public function createAnuncio(AnuncioRequest $request){
    $anuncio = new Anuncio;
    $anuncio->emaila = $request->emaila;
    $anuncio->tituloa = $request->tituloa;
    $anuncio->descricao = $request->descricao;
    $anuncio->codc = $request->codc;
    $anuncio->codp = $request->codp;
    $anuncio->valor = $request->valor;
    $anuncio->qtvisit = 0;
    $anuncio->prior = $request->prior ? true : false;
    $anuncio->tipo = $request->tipo;
    $anuncio->qtitens = $request->qtitens ? $request->qtitens : null;
    $anuncio->condicao = $request->condicao;
    $anuncio->dataex = date('Y-m-d H:i:s', strtotime("+1 month"));

    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem1', 1);
    if($nomearquivo) $anuncio->imagem1 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem2', 2);
    if($nomearquivo) $anuncio->imagem2 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem3', 3);
    if($nomearquivo) $anuncio->imagem3 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem4', 4);
    if($nomearquivo) $anuncio->imagem4 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem5', 5);
    if($nomearquivo) $anuncio->imagem5 = $nomearquivo;

    $anuncio->save();

    if($request->prior) $this->geraBoletoPdf($request);

    return view('anuncio/novosuccess');
  }

}
