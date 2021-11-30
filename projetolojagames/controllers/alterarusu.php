<?php
include("../models/conexao.php");
include("../models/bancousu.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (alterarusu($conexao,$codusu,$emailusu,$senhausu)){
    echo("Usuario alterado com sucesso");
}else{
    echo("Não foi possivel alterar o usuario");
}
include("../views/footer.php");
?>