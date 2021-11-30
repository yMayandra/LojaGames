<?php
include("../models/conexao.php");
include("../models/bancousu.php");
include("../models/bancoclie.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirclie($conexao,$codUsu,$nomeCli,$cpfCli,$foneCli,$datanasCli)){
    echo("Cliente cadastrado com sucesso.");
}else{
    echo("Cliente não cadastrado.");
}
include("../views/footer.php");
?>