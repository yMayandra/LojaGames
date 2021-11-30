<?php
    function inserirped($conexao,$codCliFK,$codFunFK,$codJogFK,$totaljogPed){

        $query="insert into tbpedidos(codCliFK,codFunFK,codJogFK,totaljogPed)values('{$codCliFK}','{$codFunFK}','{$codJogFK}','{$totaljogPed}')";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
 




?>
