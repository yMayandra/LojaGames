<?php

include("../models/conexao.php");
include("../models/bancousu.php");
include("../views/header.php");


extract($_REQUEST,EXTR_OVERWRITE);

if(deletarusu($conexao,$codusudeletar)){
    echo("Usuario deletado com sucesso.");
}else{
    echo("Erro ao deletar o usuario.");
}
include("../views/footer.php");
?>