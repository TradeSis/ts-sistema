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
        $stab = 'empresa';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "empresa") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=empresa" role="tab" style="color:black">Empresa</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "login") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=login" role="tab" style="color:black">Login</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if ($stab == "aplicativo") {
            echo " active ";
          } ?>"
            href="?tab=configuracao&stab=aplicativo" role="tab" style="color:black">Aplicativos</a>
        </li>

    

      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "empresa") {
            $ssrc = "empresa.php";
          }
          if ($stab == "login") {
            $ssrc = "login.php";
          }
          if ($stab == "aplicativo") {
            $ssrc = "aplicativo.php";
          }

          if ($ssrc !== "") {
            //echo $ssrc;
            include($ssrc);
          }

      ?>

    </div>
  </div>



</div>
