<?php
include("../models/conexao.php");
include("../models/bancojogos.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (alterarjogos($conexao,$codJog,$jogo,$tamanhoJog,$precoJog,$requisitoJog,$consoleJog,$classificacaoJog,$avaliacaoJog)){
    echo("Jogo alterado com sucesso");
}else{
    echo("Não foi possivel alterar o arquivo");
}
include("../views/footer.php");
?>