
<?php
session_start();
$email = isset($_SESSION["emailusu"])? $_SESSION["emailusu"]:null;
if($email !=null){  
include("../views/header.php");
}
?>
<br>
<style>
.card-title{
   text-align: center;
}


</style>
    <div class="tudo">
    <div class="card-body">
    <div class="card w-75 p-4">
    <p class="card-center"> 
    <form method="Post" action="../controllers/inserirusu.php">
        <p>Email <input type="email" required name="emailusu"></p>
        <p>Senha <input type="password" required name="senhausu"></p>
        <p>Pin <input type="password" name="pin"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>
    </div>
    </div>

<?php
if($email != null){  
 include("../views/footer.php"); 
    }

?>