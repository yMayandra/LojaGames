<?php
session_start();
include_once("../models/bancousu.php");
include_once("../models/conexao.php");


$email= $_POST["email"];
$senha= $_POST["senha"];
$acesso= buscaacesso($conexao, $email, $senha);

if ($email === $acesso){
    header("Location:../views/index.php");
}else{
    $_SESSION["msg"]="<div class='alert alert-danger' role='alert'> Erro! Dados não encontrados.. Tente Novamente.</div>";
    header("Location:../views/logar.php");
}
?>