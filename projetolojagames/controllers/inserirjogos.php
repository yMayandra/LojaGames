<?php
include("../models/conexao.php");
include("../models/bancojogos.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (inserirjogos($conexao,$jogo,$tamanhojog,$precojog,$requisitojog,$consolejog,$classificacaojog,$avaliacaojog)){
    echo("Jogo cadastrado com sucesso");
}else{
    echo("Jogo não cadastrado");
}
include("../views/footer.php");
?>