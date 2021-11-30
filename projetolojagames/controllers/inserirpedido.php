<?php
include("../models/conexao.php");
include("../models/bancoped.php");
include("../models/bancoclie.php");
include("../models/bancojogos.php");
include("../models/bancofun.php");
include("../views/header.php");
$codFunFK=$_SESSION['codFun'];
$codCliFK=$_SESSION['codCli'];
$codJogFK=$_SESSION['codJog'];
$totaljogPed=$_SESSION['precoJog'];
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirped($conexao,$codCliFK,$codFunFK,$codJogFK,$totaljogPed)){
    echo("Pedido realizado com sucesso.");
}else{
    echo("Pedido não realizado.");
}
include("../views/footer.php");
?>