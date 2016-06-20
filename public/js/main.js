/*
*	Main JS - Chapecó Classificados
*	Jonathan Rauber, Nicholas Brutti
*/

/*
  Estilo botão enviar arquivo imagem
$(document).ready(function() {
  var i;odocument.getElementsByName()
  var fileInput = document.getElementsByClassName('file');
  for(i = 0; i < fileInput.length; i++)
    fileInput[i].title = 'Selecionar arquivo';
  $('input[type=file]').bootstrapFileInput();
  $('.file-inputs').bootstrapFileInput();
});
*/

function novoPerfilProdServ(){
  var option = document.getElementsByName('tipo');
  if(option[1].checked){
    document.getElementsByClassName('condicao')[0].style.display = 'none';
    document.getElementsByClassName('qtitens')[0].style.display = 'none';
    document.getElementsByClassName('pagamentos')[0].style.display = 'none';
  }
  else {
    document.getElementsByClassName('condicao')[0].style.display = 'block';
    document.getElementsByClassName('qtitens')[0].style.display = 'block';
    document.getElementsByClassName('pagamentos')[0].style.display = 'block';
  }
}

function ehGratis(){
  if(document.getElementsByName('gratis')[0].checked)
    document.getElementsByName('valor')[0].disabled = true;
  else document.getElementsByName('valor')[0].disabled = false;
}
