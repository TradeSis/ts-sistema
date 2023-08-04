<?php
include_once('../head.php');
include_once('../database/categorias.php');
include_once('../database/eventos.php');
$idEvento = $_GET['idEvento'];
$evento = buscaEventos($idEvento);
$categorias = buscaCategorias();
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Evento</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="eventos.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/eventos.php?operacao=alterar" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Evento*</label>
                            <input type="text" name="nomeEvento" class="form-control" value="<?php echo $evento['nomeEvento'] ?>">
                            <input type="text" class="form-control" name="idEvento" value="<?php echo $evento['idEvento'] ?>" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -43px;">Descrição do Evento</label>
                            <textarea name="descricaoEvento" id="" cols="135" rows="10"><?php echo $evento['descricaoEvento'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Data do Evento</label>
                            <input type="date" name="dataEvento" class="form-control" value="<?php echo $evento['dataEvento'] ?>">
                            
                        </div>
                    </div>
                    <div class="col-sm-4" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Cidade</label>
                            <input type="text" name="cidadeEvento" class="form-control" value="<?php echo $evento['cidadeEvento'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-4" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Local</label>
                            <input type="text" name="localEvento" class="form-control" value="<?php echo $evento['localEvento'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="row">
                        <div class="col-sm-6" style="margin-top: 50px">
                            <div class="col-sm-6" style="margin-top: -20px">
                                <label class='control-label' for='inputNormal' style="margin-top: -50px;">Capa Evento</label>
                                <label class="picture" for="foto" tabIndex="0">
                                    <img src="<?php echo URLROOT ?>/img/<?php echo $evento["capaEvento"] ?>" width="100%" height="100%" alt="">
                                </label>
                                <input type="file" name="capaEvento" id="foto">
                            </div>
                        </div>

                        <div class="col-sm-6" style="margin-top: 50px">
                            <div class="col-sm-6" style="margin-top: -20px">
                                <label class='control-label' for='inputNormal' style="margin-top: -50px;">Banner Evento</label>
                                <label class="picture" for="banner" tabIndex="0">
                                    <img src="<?php echo URLROOT ?>/img/<?php echo $evento["bannerEvento"] ?>" width="100%" height="100%" alt="">
                                </label>
                                <input type="file" name="bannerEvento" id="banner">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 ml-4" style="margin-top: 40px">
                        <div class="select-form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -45px;">Esconder</label>
                            <label for="esconderEvento">esconder</label>
                            <input type="range" id="esconderEvento" name="esconderEvento" min="0" max="1" value="<?php echo $evento['esconderEvento'] ?>" style="width: 15%;">
                            <label for="esconderEvento">aparecer</label>
                        </div>
                    </div>

                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="select-form-group">

                            <label class="labelForm">Tipo Evento*</label>
                            <select class="select form-control" name="tipoEvento">
                                    <option value="<?php echo $evento['tipoEvento'] ?>"><?php echo $evento['tipoEvento'] ?></option>
                                    <option value="evento">Evento</option>
                                    <option value="visitacao">Visitação</option>
                                    <option value="cursos">Cursos</option>
                                    <option value="podcast">Podcast</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">link do Evento</label>
                            <input type="text" name="linkEvento" class="form-control" value="<?php echo $evento['linkEvento'] ?>">
                        </div>
                    </div>
                </div>


        </div>

        <div style="text-align:right; margin-right:-20px; margin-top:20px">
            <button type="submit" class="btn btn-sm btn-success">Salvar</button>
        </div>
        </form>
    </div>

    </div>

    <script>
        //Carregar a FOTO na tela
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

        //Carregar a BANNER na tela
        const inputFile2 = document.querySelector("#banner");
        const pictureImage2 = document.querySelector(".picture__image2");
        const pictureImageTxt2 = "Carregar imagem2";
        pictureImage2.innerHTML = pictureImageTxt2;

        inputFile.addEventListener("change", function(e) {
            const inputTarget2 = e.target;
            const file2 = inputTarget2.files2[0];

            if (file2) {
                const reader2 = new FileReader2();

                reader2.addEventListener("load", function(e) {
                    const readerTarget2 = e.target;

                    const img2 = document.createElement("img2");
                    img2.src = readerTarget.result;
                    img2.classList.add("picture__img2");

                    pictureImage2.innerHTML = "";
                    pictureImage2.appendChild(img2);
                });

                reader2.readAsDataURL(file2);
            } else {
                pictureImage2.innerHTML = pictureImageTxt2;
            }
        });
    </script>

</body>

</html>