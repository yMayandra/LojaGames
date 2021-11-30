<?php
function inserirusu($conexao,$emailusu,$senhausu,$pin){
    $option= ['cost'=>8];
    $senhacrypto =password_hash($senhausu,  PASSWORD_BCRYPT, $option);
    $query ="insert into tbusuarios(emailUsu,senhaUsu,pinUsu)value('{$emailusu}','{$senhacrypto}','{$pin}')";
    $resultados = mysqli_query($conexao,$query); 
    return $resultados;
}

function listausu($conexao){
    $query = "select * from tbusuarios";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}

function listausuCod($conexao,$codusu){
    $query = "select * from tbusuarios where codUsu={$codusu}";
    $resultados =mysqli_query($conexao,$query);
    $resul  = mysqli_fetch_array($resultados);
    return $resul;

}
function alterarusu($conexao,$codusu,$emailusu,$senhausu){
    $query= "update tbusuarios set 
    emailUsu='{$emailusu}', 
    senhaUsu= '{$senhausu}'
    where codUsu = '{$codusu}' ";
    $resultados = mysqli_query ($conexao, $query);
    return $resultados;
    }
    
    
    function deletarusu($conexao,$codusu){
        $query="delete from tbusuarios where codUsu = $codusu";
        $resultados = mysqli_query($conexao,$query);
        return $resultados;
    }

    function buscaacesso($conexao, $email,$senha){
        $query="select * from tbusuarios where emailUsu='{$email}'";
        $resultados= mysqli_query($conexao,$query);
        
        if(mysqli_num_rows($resultados)>0){
            $linha= mysqli_fetch_assoc($resultados);

                if(password_verify($senha, $linha["senhaUsu"])){
                    $_SESSION["emailusu"]=$linha["emailUsu"];
                    $_SESSION["codusu"]=$linha["codUsu"];
                    return $linha["emailUsu"];
                }else{
                    return "Senha incorreta";
                } 
        } else {
            return"Email não Cadastrado";
        }
    }

    function sairsistema(){
        session_destroy();
        $_SESSION["msg"]="<div class='alert alert-danger' role='alert'>Sessão Expirada</div>";
        header("Location:../views/logar.php");
    }
    
?>
