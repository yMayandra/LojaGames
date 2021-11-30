<?php
include("../models/conexao.php");
include("../models/bancoclie.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarclie($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli)){
    echo("Cliente alterado com sucesso.");
}else{
    echo("Cliente não alterado.");
}
include("../views/footer.php");
?>