<?php
 include_once '../head.php';
 include_once '../database/temas.php';

 $conexao = conectaMysql();
 $tema = buscaTema();
/* json_encode($tema);
return; */
?>



<style>
input[type="radio"] {
        visibility: hidden;
}
    
.inputRadio label {
    display: block;
    border: 2px solid #CCC;
    width: 230px;
	padding: 2px;
    float: left;
	text-align: center;
	
}

input[type="radio"]:checked+label {  
	border: 4px solid #000;
}
input[type="radio"]:checked+label::before {  
	content: "Ativo ";
}	
	

#DivConfiguracoes img {
  height: 120px;
}
</style>
<?php
$default = '';
$roxo  = '';
$vermelho = '';
$azul     = '';
$verde     = '';

$configs  = mysqli_query($conexao, "select * from temas where ativo = true limit 1");
  $config = mysqli_fetch_assoc($configs);

 switch ($config["descricao"]){
      case  'Default'     : $default  = 'checked';  break;
		  case  'Roxo'          : $roxo  = 'checked';  break;
		  case  'Vermelho'         : $vermelho  = 'checked';  break;
		  case  'Azul'             : $azul  = 'checked';  break;
      case  'Verde'             : $verde  = 'checked';  break;
		  
		  default : $default  = 'checked'; $defaultAtivo = 'Ativo';
	  }
?>


<div class="container mt-4" style="text-align:center">
  <h3>Configurações</h3>
	<h6 style="text-align:left; margin-top:30px">Cor do Cabeçalho</h6>
    <form method="post" id="grava" name="grava" action="../database/temas.php" enctype="multipart/form-data">
        <div id="DivConfiguracoes" style="text-align:center">
        
          <div class="row inputRadio" >
            <input type="radio" name="tema" id="i1" value="Default" <?php echo $default; ?> />
            <label for="i1" style="background-color: #E2EBEB;;"><img src="#" alt=""></label>

            <input type="radio" name="tema" id="i2" value="Roxo" <?php echo $roxo; ?> />
            <label for="i2" style="background-color: purple;"><img src="#" alt=""></label>

            <input type="radio" name="tema" id="i3"   value="Vermelho" <?php echo $vermelho; ?> />
            <label for="i3" style="background-color: red;"><img src="#" alt="" ></label>
            
            <input type="radio" name="tema" id="i4" value="Azul" <?php echo $azul; ?> />
            <label for="i4" style="background-color: blue;"><img src="#" alt=""> </label>

            <input type="radio" name="tema" id="i5" value="Verde" <?php echo $verde; ?> />
            <label for="i5" style="background-color: green;"><img src="#" alt=""> </label>
          </div>

          <!-- <div class="row inputRadio" >
            <input type="radio" name="tema" id="i6" value="RoxoVertical" <?php echo $roxoVertical; ?> />
            <label for="i6"><img src="#" alt=""></label>
          </div> -->

          <div class="row">
            <div class="form-group">
              <button class="btn btn-primary" id="btnGravar"><i class="fa fa-save"></i> Salvar Alterações</button>
            </div>
          </div>

        </div>
    </form>

</div>



</body>

</html>