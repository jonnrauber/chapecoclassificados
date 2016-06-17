<?php

namespace App;

use Miqueiasdesouza\Boleto\Boleto;
class BoletoBB
{
  private $boleto;

  /**
   * Instanciando a classe Boleto
   */
  public function __construct()
  {
      require_once __DIR__.'/../vendor/miqueiasdesouza/boleto/src/Boleto.php';
      $this->boleto = new Boleto;
  }

  /**
   * Metodo principal
   * @return mixed
   */
  public function init($cliente)
  {
    //Definindo os dados do sacado
    $this->boleto->sacado(array(
            'sacado'    => $cliente->nome,
            'endereco1' => $cliente->bairro,
            'endereco2' => $cliente->cidade.' - '.$cliente->estado
        ));

    $this->boleto->cedente(array(
      'agencia'           => "1100", // Num da agencia, sem digito
      'agencia_dv'        => "0", // Digito do Num da agencia
      'conta'             => "0102003",     // Num da conta, sem digito
      'conta_dv'          => "4",
      'conta_cedente'     => "0102003", // ContaCedente do Cliente, sem digito (Somente Números)
      'conta_cedente_dv'  => "4", // Digito da ContaCedente do Cliente
      'carteira'          => "06",  // Código da Carteira: pode ser 06 ou 03
      'identificacao'     => "BoletoPhp - Código Aberto de Sistema de Boletos",
      'cpf_cnpj'          => "",
      'endereco'          => "Rua Guaporé 33-D, Centro",
      'cidade_uf'         => "Chapecó / SC",
      'cedente'           => "Classificados Chapecó",
      'contrato'          =>  "12345678900"
    ));

    $this->boleto->banco('bb', array(
      'valor_boleto'          => '15,00', // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
      'nosso_numero'          => '789', //Num do pedido ou do documento = Nosso numero
      'numero_documento'      =>  '789', //// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
      'data_vencimento'       =>  date('d/m/Y', strtotime("+1 week")), //Data de emissão do Boleto
      'data_documento'        =>  date('d/m/Y'), //Data de processamento do boleto (opcional)
      'valor_unitario'        =>  '15,00',
      'demonstrativo1'        =>  "Pagamento de anúncio no site Classificados Chapecó",
      'demonstrativo2'        =>  "",
      'demonstrativo3'        =>  "Empresa- http://www.classificadoschapeco.com",
      'instrucoes1'           =>  "- Sr. Caixa, cobrar multa de 2% após o vencimento",
      'instrucoes2'           =>  "- Receber até 7 dias após o vencimento",
      'instrucoes3'           =>  "- Em caso de dúvidas entre em contato conosco: contato@classificadoschapeco.com.br",
    ));

    //Retorna o Objeto do Boleto
    return $this->boleto;
  }

  //Gerando o PDF do boleto
  public function pdf($boleto){
      $boleto->pdf();
  }

  //Gerando o HTML do boleto
  public function html($boleto){
      $boleto->html();
  }
}
