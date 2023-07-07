<?php
include_once('../head.php');
include_once('../database/autor.php');
include_once('../database/categorias.php');
include_once('../database/posts.php');
$idPost = $_GET['idPost'];
$post = buscaPosts($idPost);
$autores = buscaAutor();
$categorias = buscaCategorias();
?>


<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Editar Post</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="posts.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/posts.php?operacao=alterar" method="post" enctype="multipart/form-data">


                <div class="row">
                    <div class="col-sm-3" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label>Imagem</label>
                            <label class="picture" for="foto" tabIndex="0">
                            <img src="<?php echo URLROOT ?>/img/<?php echo $post["imgDestaque"] ?>" width="100%" height="100%" alt="">
                            </label>
                            <input type="file" name="imgDestaque" id="foto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Slug</label>
                            <input type="titulo" name="slug" class="form-control" value="<?php echo $post['slug'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-9" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Titulo</label>
                            <input type="titulo" name="titulo" class="form-control" value="<?php echo $post['titulo'] ?>">
                            <input type="text" class="form-control" name="idPost" value="<?php echo $post['idPost'] ?>" style="display: none">
                        </div>
                    </div>

                </div>

                <div class="row">
                <div class="col-sm-3" style="margin-top: 10px">
                        <div class="select-form-group">

                            <label class="labelForm">Categorias*</label>
                            <select class="select form-control" name="idCategoria">
                            <option value="<?php echo $post['idCategoria'] ?>"><?php echo $post['nomeCategoria']  ?></option>
                                <?php
                                foreach ($categorias as $categoria) {
                                ?>
                                    <option value="<?php echo $categoria['idCategoria'] ?>"><?php echo $categoria['nomeCategoria']  ?></option>
                                <?php  } ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="select-form-group">

                            <label class="labelForm">Colunista/Autor*</label>
                            <select class="select form-control" name="idAutor">
                            <option value="<?php echo $post['idAutor'] ?>"><?php echo $post['nomeAutor']  ?></option>
                                <?php
                                foreach ($autores as $autor) {
                                ?>
                                    <option value="<?php echo $autor['idAutor'] ?>"><?php echo $autor['nomeAutor']  ?></option>
                                <?php  } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3" style="margin-top: 11px;">
						<label class="labelForm">Data</label>
						<input type="text" class="data select form-control" name="data"
							value="<?php echo date('d/m/Y H:i', strtotime($post['data'])) ?>" disabled>
					</div>
                 

                <!--     <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Comentarios</label>
                            <input type="text" name="comentarios" class="form-control" autocomplete="off">
                        </div>
                    </div> -->
                </div>


                <!-- <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                            <label>Introdução</label>
                            <textarea name="textoIntro" cols="130" rows="5" required></textarea>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -43px;">Conteudo</label>
                            <textarea name="txtConteudo" cols="135" rows="7" id="txtConteudo"><?php echo $post['txtConteudo'] ?></textarea>
                        </div>
                    </div>
                </div>



                <div style="text-align:right; margin-right:-20px; margin-top:20px">
                    <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                </div>
            </form>
        </div>

    </div>


    <script src="vendor/ckeditor/ckeditor.js"></script>
    <script>
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