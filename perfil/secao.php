<?php

include_once('../head.php');
include_once('../database/secao.php');

$secoes = buscaSecao();
/* echo json_encode($secoes); */

?>
<style>
    .nav-item{
        cursor: pointer;
    }
 
</style>
<body class="bg-transparent">
    <div class="container text-center" style="margin-top:30px"> 
        
            <div class="row mt-4">
                <div class="col-sm-8">
                        <h4 class="tituloTabela">Seções</h4>
                        
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="secao_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
<!--=== Conteudo ===-->
            <ul class="nav nav-tabs" id="iframeMenu">
                <li class="nav-item">
                    <a class="nav-link" style="color: #000;" src="secao_todos.php">Todas</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" id="tab1" src="secao_tipoSecao.php?tipoSecao=header" style="color: #000;">Header</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" id="tab2" src="secao_tipoSecao.php?tipoSecao=footer" style="color: #000;">Footer</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" id="tab3" src="secao_tipoSecao.php?tipoSecao=banner" style="color: #000;">Banner</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=principal" style="color: #000;">Principal</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=card" style="color: #000;">Card</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=lista" style="color: #000;">Lista</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=form" style="color: #000;">Form</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=divisaoPagina" style="color: #000;">Divisor</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" src="secao_tipoSecao.php?tipoSecao=sobreNos" style="color: #000;">sobre Nos</a>
                </li>
            </ul>



            <div class="diviFrame" style="overflow:hidden; height:850px" >
                <iframe class="iFrame container-fluid " id="myIframe" src="secao_todos.php" height="850px"></iframe>
            </div>
<!--=== Conteudo ===-->

<!--         <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo Seção</th>
                        <th>Titulo</th>
                        <th>Arquivo Fonte</th>

                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($secoes as $secao) {
                ?>
                    <tr>
                        <td><?php echo $secao['tipoSecao'] ?></td>
                        <td><?php echo $secao['tituloSecao'] ?></td>
                        <td><?php echo $secao['arquivoFonte'] ?></td>
                        
                        <td>
                            <a class="btn btn-primary btn-sm" href="secao_alterar.php?idSecao=<?php echo $secao['idSecao'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="secao_excluir.php?idSecao=<?php echo $secao['idSecao'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div> -->
    </div>



<script>

    $(document).ready(function() {

	// IFRAMA
	$("#iframeMenu a").click(function() {

		var value = $(this).text();
		value = $(this).attr('src');
		/* alert (value); */

		//IFRAME TAG
		if (value) {
			$("#myIframe").attr('src', value);

		}
		})

	});


/* 
    let count = 1;
    document.getElementById("tab1").checked = true;
    document.getElementsByClassName

    $('.nav-link').click(function(){ 
        count++;
    if(count>5){
        count = 1;
    }
    alert(count);
    $("tab1"+count).toggleClass('active');
    }); */
/* 
    $('.nav-link').click(function(){ 
    $('#1').removeClass('active');
    $('#2').toggleClass('active');
    }); */

</script>
</body>

</html>