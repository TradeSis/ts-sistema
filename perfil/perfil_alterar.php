
<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/perfil.php');

$perfil = buscaPerfil($_GET['idPerfil']);
?>



<body class="bg-transparent">

    <div class="container" style="margin-top:10px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-sm">
                        <h3 class="col">Editar Perfil</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="perfil.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/perfil.php?operacao=alterar" method="post" enctype="multipart/form-data">

                    <div class="form-group" style="margin-top:10px">
                    
                    <div class="row">
                        <div class="col-sm-6" style="margin-top: 10px">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $perfil['nome'] ?>">
                            <input type="text" class="form-control" name="idPerfil" value="<?php echo $perfil['idPerfil'] ?>" style="display: none">
                        </div>
                        
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label>Foto</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <!-- <img src="admin/imgPerfil/<?php echo $perfil['foto'] ?>"> -->

                            <input type="file" name="foto" id="foto" value="admin/imgPerfil/<?php echo $perfil['foto'] ?>">
                            
                            </div>
                    </div>
   

                    <div class="row">
                        <div class="col-sm-6" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Endereço</label>
                                <input type="text" name="endereco" class="form-control" required value="<?php echo $perfil['endereco'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Numero</label>
                                <input type="text" name="numero" class="form-control" required value="<?php echo $perfil['numero'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm-4" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Bairro</label>
                                <input type="text" name="bairro" class="form-control" required value="<?php echo $perfil['bairro'] ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Cep</label>
                                <input type="text" name="cep" class="form-control" required value="<?php echo $perfil['cep'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Cidade</label>
                                <input type="text" name="cidade" class="form-control" required value="<?php echo $perfil['cidade'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Estado</label>
                                <input type="text" name="estado" class="form-control" required value="<?php echo $perfil['estado'] ?>" >
                            </div>
                        </div>
                    </div>

                    </div>

                    <div class="row">
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Email</label>
                                <input type="email" name="email" class="form-control" required value="<?php echo $perfil['email'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Telefone</label>
                                <input type="number" name="telefone" class="form-control" required value="<?php echo $perfil['telefone'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Whatsapp</label>
                                <input type="number" name="whatsapp" class="form-control" required value="<?php echo $perfil['whatsapp'] ?>" >
                            </div>
                        </div>
                    </div>

                    <label>Logo</label>
                        <label class="picture" for="logo" tabIndex="0">
                            <span class="picture__image"></span>
                        </label>

                        <input type="file" name="logo" id="logo">

                    <div class="row">
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Twitter</label>
                                <input type="email" name="twitter" class="form-control" required value="<?php echo $perfil['twitter'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">facebook</label>
                                <input type="email" name="facebook" class="form-control" required value="<?php echo $perfil['facebook'] ?>" >
                            </div>
                        </div>
                        <div class="col-sm" style="margin-top: 10px">
                            <div class="form-group">
                                <label class='control-label' for='inputNormal' style="margin-top: -20px;">Instagram</label>
                                <input type="email" name="instagram" class="form-control" required value="<?php echo $perfil['instagram'] ?>" >
                            </div>
                        </div>
                    </div>
                        


                    <div class="card-footer bg-transparent" style="text-align:right">

                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script>



        $(document).ready(function() {
            $("#form").submit(function() {
                var formData = new FormData(this);

                $.ajax({
                    url: "../database/aplicativo.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    success: refreshPage(),
                    cache: false,
                    contentType: false,
                    processData: false,

                });

            });

            function refreshPage() {
                window.location.reload();
            }
        });

        

        //Carregar a imagem na tela
        const inputFile = document.querySelector("#foto");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Carregar imagem";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>

</body>

</html>