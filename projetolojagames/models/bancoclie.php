<?php 
    function inserirclie($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){

        $query="insert into tbclientes(codUsuFK,nomeCli,cpfCli,foneCli,datanasCli)values('{$codUsuFK}','{$nomeCli}','{$cpfCli}','{$foneCli}','{$datanasCli}')";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaclie($conexao){
        $query="Select * From tbclientes";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaclieCod($conexao,$codCli){
        $query="Select * from tbclientes where codCli={$codCli}";
        $resultados=mysqli_query($conexao,$query);
        $resul=mysqli_fetch_array($resultados);
        return $resul;
    }
        function alterarclie($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){
            $query="update tbclientes set nomeCli='{$nomeCli}', cpfCli='{$cpfCli}', foneCli = '{$foneCli}' where datanasCli = '{$datanasCli}'
            ";
            $resultados=mysqli_query($conexao,$query);
            return $resultados;
    }
    function deletarclie($conexao,$codCli){
        $query="delete from tbclientes where codCli=$codCli";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listatudoClienteNome($conexao,$nomecliente){
        $query = "select * from tbclientes where nomeCli like '%{$nomecliente}%'";
        $resultados = mysqli_query($conexao,$query);
        return $resultados;
    }
    function clienteusuario($conexao,$codUsuario){
        $query= "Select * from tbusuarios where codUsu='{$codUsuario}'";
        $resultados= mysqli_query($conexao,$query);
        $resul= mysqli_fetch_array($resultados);
        return $resul;

    }
?>
