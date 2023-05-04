<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/usuarioaplicativo.php');
include_once('../database/usuario.php');
include_once('../database/aplicativo.php');

$usuarios = buscaUsuarios();
$aplicativos = buscaAplicativos();

$vusuario = $_GET['idUsuario'];
$vaplicativo = $_GET['aplicativo'];

$usuarioaplicativo = buscaUsuarioAplicativo($vusuario,$vaplicativo);
?>

<body class="bg-transparent">

<div class="container" style="margin-top:10px">

<div class="col-sm mt-4" style="text-align:right">
    <a href="usuarioaplicativo.php" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
</div>
<div class="col-sm">
    <spam class="col titulo">Alterar Usuario/Aplicativo</spam>
</div>

<div class="container" style="margin-top: 30px">

    <form action="../database/usuarioaplicativo.php?operacao=alterar" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Usuário</label>
                    <select class="select form-control" style="padding-right: 50px;" name="idUsuario">
                    <?php
                    foreach ($usuarios as $usuario) {
                    ?>
                    <option <?php
                    if ($usuario['idUsuario'] == $vusuario) {
                        echo "selected";
                    }
                    ?> value="<?php echo $usuario['idUsuario'] ?>"><?php echo $usuario['nomeUsuario']  ?></option>
                    <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Aplicativo</label>
                    <select class="select form-control" style="padding-right: 50px;" name="aplicativo">
                    <?php
                    foreach ($aplicativos as $aplicativo) {
                    ?>
                    <option <?php
                    if ($aplicativo['nomeAplicativo'] == $vaplicativo) {
                        echo "selected";
                    }
                    ?> value="<?php echo $aplicativo['nomeAplicativo'] ?>"><?php echo $aplicativo['nomeAplicativo']  ?></option>
                    <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nivel</label>
                    <select class="select form-control" style="padding-right: 50px;" name="nivelMenu">
                        <option value="<?php echo $usuarioaplicativo['nivelMenu'] ?>">Nível <?php echo $usuarioaplicativo['nivelMenu'] ?></option>
                        <option value="1">Nível 1</option>
                        <option value="2">Nível 2</option>
                        <option value="3">Nível 3</option>
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