<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Um usuário se interessou por um anúncio seu!</title>
</head>
<body>
    <h2>Olá {{$usuario->nome}}!</h2>
    <p>Você recebeu uma nova mensagem de interesse em seu anúncio:</p>
    <h3>{{$usuario->tituloa}}</h3>
    <p><a href='{{url("anuncio/recebidos")}}'>>> Meus interesses recebidos <<</a></p>
</body>

</html>
