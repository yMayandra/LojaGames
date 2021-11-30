<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoped.php");
include_once("../models/bancofun.php");
include_once("../models/bancoclie.php");
include_once("../models/bancojogos.php");


$codUsuFK= $_SESSION["codusu"];
$funcionario=listabuscafunusu($conexao,$codUsuFK);
$_SESSION["codFun"]=$funcionario['codFun'];
?>
<div class="row g-3">
  <div class="col-md-2">
    <label for="inputcodFun" class="form-label">Código</label>
    <input type="text" readonly value="<?=$funcionario['codFun']?>" class="form-control" id="inputcodFun">
  </div>
  <div class="col-md-10">
    <label for="inputnomeFun" class="form-label">Funcionario</label>
    <input type="text" name="nomeFun" readonly value="<?=$funcionario['nomeFun']?>" class="form-control" id="inputnomeFun">
  </div>
  <!--Cod Cliente-->
  <?php
  $codCli= isset($_POST["codCli"])? $_POST["codCli"]:0;
  $cliente= isset($codCli)?listaclieCod($conexao,$codCli):"";
  $_SESSION["nomeCli"]=isset($cliente["nomeCli"])?$cliente["nomeCli"]:"";
  $_SESSION["codCli"]=isset($_POST["codCli"])?$_POST["codCli"]:0;
  ?>
  <div class="col-2">
    <label for="inputcodCli" class="form-label">Código</label>
    <form method="post" action="cadastropedido.php">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <input type="text" name="codCli" value="<?php echo($_SESSION['codCli']);?>"  class="form-control" id="inputcodCli">
    <input type="hidden" value="<?=$_SESSION['codJog']?>" name="codJog">
    <input type="hidden" value="<?=$_SESSION['nomeJog']?>" name="nomeJog">
    <input type="hidden" value="<?=$_SESSION['codFun']?>" name="codFun">
    <button class="btn btn-dark me-md-2" type="submit">Pesquisar</button>
  </div>
  </form>
  </div>
  <div class="col-10">
    <label for="inputnomeCli" class="form-label">Cliente</label>
    <input type="text" value="<?php echo($_SESSION['nomeCli']);?>" class="form-control" id="inputnomeCli" >
  </div>
  <!--Cod Jogo-->
  <?php
  $codJog= isset($_POST["codJog"])? $_POST["codJog"]:0;
  $jogo= isset($codJog)?listajogoCod($conexao,$codJog):"";
  $_SESSION["codJog"]=isset($_POST["codJog"])?$_POST["codJog"]:0;
  $_SESSION["nomeJog"]=isset($jogo["nomeJog"])?$jogo["nomeJog"]:"";
  $_SESSION["precoJog"]=isset($jogo["precoJog"])?$jogo["precoJog"]:"";
  ?>
  <div class="col-md-2">
    <label for="inputcodJog" class="form-label">Código</label>
    <form method="post" action="cadastropedido.php">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <input type="text"  name="codJog" value="<?php echo($_SESSION['codJog']);?>" class="form-control" id="inputcodJog">
    <input type="hidden" value="<?=$_SESSION['codCli']?>" name="codCli">
    <input type="hidden" value="<?=$_SESSION['nomeCli']?>" name="nomeCli">
    <input type="hidden" value="<?=$_SESSION['codFun']?>" name="codFun">
    <button class="btn btn-dark me-md-2" type="submit">Pesquisar</button>
  </div>
  </form>
  </div>
  <div class="col-md-10">
    <label for="inputnomeJog" class="form-label">Jogo</label>
    <input type="text" value="<?php echo($_SESSION['nomeJog']);?>"class="form-control" id="inputnomeJog">
  </div>
  <?php
  $jogo= isset($codJog)?listajogoCod($conexao,$codJog):"";
  $_SESSION["codJog"]=isset($_POST["codJog"])?$_POST["codJog"]:0;
  ?>
  <div class="col-md-2">
    <label for="inputvalorJog" class="form-label">Valor Unitario</label>
    <input type="text" value="<?=$jogo['precoJog']?>" class="form-control" id="inputvalorJog">
  </div>
  <form action="../controllers/inserirpedido.php" method="POST">
  <div class="col-12">
    <button  class="btn btn-dark" type="submit">Finalizar</button>
  </div>
  </form>
</div>