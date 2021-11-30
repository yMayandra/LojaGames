<?php
include("../models/conexao.php");
include("../models/bancousu.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);
if (inserirusu($conexao, $emailusu, $senhausu, $pin)){
    echo("Usuario cadastrado com sucesso");
}else{
    echo("Não foi possivel cadastrar o usuario");
}
include("../views/footer.php");
?>