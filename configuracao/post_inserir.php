<?php
include_once('../head.php');
include_once('../database/autor.php');
include_once('../database/categorias.php');
$autores = buscaAutor();
$categorias = buscaCategorias();
?>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="row mt-4">
            <div class="col-sm-8">
                <h3 class="col">Adicionar Post</h3>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="posts.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px">

            <form action="../database/posts.php?operacao=inserir" method="post" enctype="multipart/form-data">


                <div class="row">
                    <div class="col-sm-3" style="margin-top: 50px">
                        <div class="col-sm-6" style="margin-top: -20px">
                            <label>Imagem</label>
                            <label class="picture" for="foto" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <input type="file" name="imgDestaque" id="foto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Slug</label>
                            <input type="titulo" name="slug" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-9" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Titulo</label>
                            <input type="titulo" name="titulo" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                </div>

                <div class="row">
                <div class="col-sm-3" style="margin-top: 10px">
                        <div class="select-form-group">

                            <label class="labelForm">Categorias*</label>
                            <select class="select form-control" name="idCategoria">
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
                                <?php
                                foreach ($autores as $autor) {
                                ?>
                                    <option value="<?php echo $autor['idAutor'] ?>"><?php echo $autor['nomeAutor']  ?></option>
                                <?php  } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: -28px">
                        <div class="form-group">
                            <label class="labelForm">Data</label>
                            <input type="date" name="data" class="form-control" required autocomplete="off">
                        </div>
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
                            <textarea name="txtConteudo" cols="135" rows="7" id="txtConteudo"></textarea>
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
        // FIm
        ClassicEditor
            .create(document.querySelector('#txtConteudo'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'undo',
                        'redo',
                        '|',
                        'bold',
                        'italic',
                        'fontSize',
                        'fontColor',
                        'fontBackgroundColor',
                        'fontFamily',
                        '|',
                        'link',
                        '|',
                        'bulletedList',
                        'numberedList',
                        'indent',
                        'outdent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        '|',
                        'exportPdf',
                        'exportWord'
                    ]
                },
                language: 'pt-br',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;








            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: 9vyad6gsfs8k-2evma7h1quav');
                console.error(error);
            });
    </script>



</body>

</html>