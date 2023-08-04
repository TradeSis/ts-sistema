<?php
include_once(__DIR__ . '/../head.php');
?>

<style>
  .temp {
    color: black
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 mb-3">
      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <?php
        $stab = 'cliente';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "cliente") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=cliente" role="tab" style="color:black">Cliente</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "usuarios") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=usuarios" role="tab" style="color:black">Usuários</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "aplicativo") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=aplicativo" role="tab" style="color:black">Aplicativos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "menu") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=menu" role="tab" style="color:black">Menu</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "menuprograma") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=menuprograma" role="tab" style="color:black">Menu Programa</a>
        </li>
    

      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "cliente") {
            $ssrc = "clientes.php";
          }
          if ($stab == "usuarios") {
            $ssrc = "usuario.php";
          }
          if ($stab == "aplicativo") {
            $ssrc = "aplicativo.php";
          }
          if ($stab == "menu") {
            $ssrc = "menu.php";
          }
          if ($stab == "menuprograma") {
            $ssrc = "menuprograma.php";
          }

          if ($ssrc !== "") {
            //echo $ssrc;
            include($ssrc);
          }

      ?>

    </div>
  </div>



</div>
