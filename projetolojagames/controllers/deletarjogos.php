<?php

include("../models/conexao.php");
include("../models/bancojogos.php");
include("../views/header.php");


extract($_REQUEST,EXTR_OVERWRITE);

if(deletarJogos($conexao,$codjogdeletar)){
    echo("Jogo deletado com sucesso.");
}else{
    echo("Erro ao deletar o arquivo.");
}
include("../views/footer.php");
?>