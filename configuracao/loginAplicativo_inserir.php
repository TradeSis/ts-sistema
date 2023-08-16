<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/login.php');
include_once('../database/aplicativo.php');

$login = buscaLogins($_GET['idLogin']);
$aplicativos = buscaAplicativos();

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Inserir Usuario/Aplicativo</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

            <form action="../database/loginAplicativo.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -22px;">Usuário</label>
                            <input type="text" class="form-control" name="loginNome" value="<?php echo $login['loginNome'] ?>" readonly>
                            <input type="text" class="form-control" name="idLogin" value="<?php echo $login['idLogin'] ?>" hidden>
                        </div>
                    </div>
                    <div class="col-sm mt-1">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Aplicativo</label>
                            <select class="select form-control" style="padding-right: 50px;" name="idAplicativo">
                                <?php
                                foreach ($aplicativos as $aplicativo) {
                                ?>
                                    <option value="<?php echo $aplicativo['idAplicativo'] ?>"><?php echo $aplicativo['nomeAplicativo']  ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm mt-1">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nivel</label>
                            <select class="select form-control" style="padding-right: 50px;" name="nivelMenu">
                                <option value="1">Nível 1</option>
                                <option value="2">Nível 2</option>
                                <option value="3">Nível 3</option>
                                <option value="4">Nível 4</option>
                                <option value="5">Nível 5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div style="text-align:right; margin-top:20px">
                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
                </div>
            </form>

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
        const inputFile = document.querySelector("#imgAplicativo");
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