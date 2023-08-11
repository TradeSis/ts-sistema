<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/loginAplicativo.php');
include_once('../database/login.php');
include_once('../database/aplicativo.php');

$login = buscaLogins($_GET['idLogin']);
$aplicativo = buscaAplicativos($_GET['idAplicativo']);
$usuarioaplicativo = buscaLoginAplicativo($_GET['idLogin'],$_GET['nomeAplicativo']);
?>

<body class="bg-transparent">

<div class="container" style="margin-top:10px">

<div class="col-sm mt-4" style="text-align:right">
    <a href="#" onclick="history.back()" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
</div>
<div class="col-sm">
    <spam class="col titulo">Alterar Usuario/Aplicativo</spam>
</div>

<div class="container" style="margin-top: 30px">

    <form action="../database/loginAplicativo.php?operacao=alterar" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Usuário</label>
                    <input type="text" class="form-control" name="loginNome" value="<?php echo $login['loginNome'] ?>" readonly>
                    <input type="text" class="form-control" name="idLogin" value="<?php echo $login['idLogin'] ?>" hidden>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Aplicativo</label>
                    <input type="text" class="form-control" name="nomeAplicativo" value="<?php echo $aplicativo['nomeAplicativo'] ?>" readonly>
                    <input type="text" class="form-control" name="idAplicativo" value="<?php echo $aplicativo['idAplicativo'] ?>" hidden>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -15px;">Nivel</label>
                    <select class="form-control" style="padding-right: 50px;" name="nivelMenu">
                        <option <?php if ($usuarioaplicativo['nivelMenu'] == "1") { echo "selected"; } ?> value="1">1</option>
                        <option <?php if ($usuarioaplicativo['nivelMenu'] == "2") { echo "selected"; } ?> value="2">2</option>
                        <option <?php if ($usuarioaplicativo['nivelMenu'] == "3") { echo "selected"; } ?> value="3">3</option>
                        <option <?php if ($usuarioaplicativo['nivelMenu'] == "4") { echo "selected"; } ?> value="4">4</option>
                        <option <?php if ($usuarioaplicativo['nivelMenu'] == "5") { echo "selected"; } ?> value="5">5</option>
                    </select>
                </div>
            </div>
        </div>

        <div style="text-align:right; margin-top: 30px">

            <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
        </div>
    </form>
</div>

</div>

    <script>

//Carregar a imagem na tela
const inputFile = document.querySelector("#imgAplicativo");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Carregar imagem";
pictureImage.innerHTML = "<img src='<?php echo $usuarioaplicativo['pathImg'];?>'>";

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
        pictureImage.innerHTML = "";
    }
});
</script>

</body>

</html>