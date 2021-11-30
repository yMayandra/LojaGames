<?php
include("../models/conexao.php");
include("../models/bancoclie.php");
include("../views/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarclie($conexao,$codCliDeletar)){
    echo("Cliente deletado com sucesso.");
}else{
    echo("Cliente não deletado.");
}
include("../views/footer.php");
?>