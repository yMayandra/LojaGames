<?php
function inserirjogos($conexao,$jogo,$tamanhojog,$precojog,$requisitojog,$consolejog,$classificacaojog,$avaliacaojog){
    $query ="insert into tbjogos(nomeJog,tamanhoJog,precoJog,requisitoJog,consoleJog,classificacaoJog,avaliacaoJog)value('{$jogo}','{$tamanhojog}','{$precojog}','{$requisitojog}','{$consolejog}','{$classificacaojog}','{$avaliacaojog}')";

    $resultados = mysqli_query($conexao,$query); 
    return $resultados;
}

function listajogo($conexao){
    $query = "select * from tbjogos";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}

function listajogoCod($conexao,$codJog){
    $query = "select * from tbjogos where codJog={$codJog}";
    $resultados =mysqli_query($conexao,$query);
    $resul  = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarjogos($conexao,$codJog,$nomeJog,$tamanhoJog,$precoJog,$requisitoJog,$consoleJog,$classificacaoJog,$avaliacaoJog){
    $query= "update tbjogos set 
    nomeJog='{$nomeJog}', 
    tamanhoJog= '{$tamanhoJog}',
    precoJog= '{$precoJog}',
    requisitoJog = '{$requisitoJog}',
    consoleJog= '{$consoleJog}',
    classificacaoJog = '{$classificacaoJog}',
    avaliacaoJog = '{$avaliacaoJog}' where codJog = '{$codJog}' ";
    $resultados = mysqli_query ($conexao, $query);
    return $resultados;
    }
    
    
    function deletarjogos($conexao,$codJog){
        $query="delete from tbjogos where codJog = $codJog";
        $resultados = mysqli_query($conexao,$query);
        return $resultados;
    }

?>
