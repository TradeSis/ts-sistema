<?php
include_once __DIR__ . "/../config.php";


include_once "painel.php";
include_once ROOT . "/sistema/database/usuarioAplicativo.php";

$nivelMenuUsuario =  buscaUsuarioAplicativo($_SESSION['idUsuario'],'1'); //Sistema
//echo json_encode($nivelMenuUsuario);
$configuracao = 1; 

if($nivelMenuUsuario == null){
    return;
}else{
    $nivelMenu   =  $nivelMenuUsuario['nivelMenu'];
}

?>

<style>
    .nav-link.active {
        border-bottom: 3px solid #2E59D9;
        border-radius: 3px 3px 0 0;
        color: #1B4D60;
        background-color: transparent;
    }
</style>

<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <ul class="nav a" id="myTabs">


                <?php
                    $tab = '';

                    if (isset($_GET['tab'])) {$tab = $_GET['tab'];}
               
                ?>    


            <?php if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="cliente") {echo " active ";} ?>" 
                        href="?tab=cliente" 
                        role="tab"                        
                        style="color:black">Cliente</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="usuarios") {echo " active ";} ?>" 
                        href="?tab=usuarios" 
                        role="tab"                        
                        style="color:black">Usuários</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="aplicativo") {echo " active ";} ?>" 
                        href="?tab=aplicativo" 
                        role="tab"                        
                        style="color:black">Aplicativos</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="menu") {echo " active ";} ?>" 
                        href="?tab=menu" 
                        role="tab"                        
                        style="color:black">Menu</a>
                </li>
            <?php } if ($nivelMenu>=3) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="menuprograma") {echo " active ";} ?>" 
                        href="?tab=menuprograma" 
                        role="tab"                        
                        style="color:black">Menu Programa</a>
                </li>
            <?php } if ($nivelMenu>=4) { ?>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($tab=="configuracao") {echo " active ";} ?>" 
                        href="?tab=configuracao" 
                        role="tab"     
                        data-toggle="tooltip" data-placement="top" title="Configurações"                   
                        style="color:black"><i class="bi bi-gear" style="font-size: 18px;"></i></a>
                </li>
            <?php } ?>

                           
            </ul>


        </div>

    </div>

</div>

<?php
    $src="";

    if ($tab=="cliente") {$src="configuracao/clientes.php";}
    if ($tab=="usuarios") {$src="configuracao/usuario.php";}
    if ($tab=="aplicativo") {$src="configuracao/aplicativo.php";}
    if ($tab=="menu") {$src="configuracao/menu.php";}
    if ($tab=="menuprograma") {$src="configuracao/menuprograma.php";}
    if ($tab=="configuracao") {
            $src="configuracao/";
            if (isset($_GET['stab'])) {
                $src = $src . "?stab=".$_GET['stab'];
            }

            
    }
    
if ($src!=="") {
    //echo URLROOT ."/sistema/". $src;
?>
    <div class="diviFrame" style="overflow:hidden; height: 85vh">
        <iframe class="iFrame container-fluid " id="iFrameTab" src="<?php echo URLROOT ?>/sistema/<?php echo $src ?>"></iframe>
    </div>
<?php
}
?>

</body>

</html>