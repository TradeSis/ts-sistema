<?php

//echo "metodo=".$metodo."\n";
//echo "funcao=".$funcao."\n";
//echo "parametro=".$parametro."\n";

if ($metodo == "GET") {

  if ($funcao == "login" && $parametro == "verifica") {
    $funcao = "configuracao/verifica";
    $parametro = null;
  }

  switch ($funcao) {

    case "perfil":
      include 'perfil.php';
      break;

    case "paginas_slug":
      include 'paginas_slug.php';
      break;

    case "paginas":
      include 'paginas.php';
      break;

    case "secoes":
      include 'secoes.php';
      break;

    case "secoesPagina":
      include 'secoesPagina.php';
      break;

    case "marcas":
      include 'marcas.php';
      break;

    case "posts_slug":
      include 'posts_slug.php';
      break;

    case "posts":
      include 'posts.php';
      break;

    case "secoesPagina_individual":
      include 'secoesPagina_individual.php';
      break;

    case "servicos_card":
      include 'servicos_card.php';
      break;

    case "servicos":
      include 'servicos.php';
      break;

    case "posts_recentes":
      include 'posts_recentes.php';
      break;

    case "banners":
      include 'banners.php';
      break;

    case "secoes_tipoSecao":
      include 'secoes_tipoSecao.php';
      break;

    case "servicos_slug":
      include 'servicos_slug.php';
      break;

    case "temas":
      include 'temas.php';
      break;

    case "autor":
      include 'autor.php';
      break;

    case "categorias":
      include 'categorias.php';
      break;

    case "produtos":
      include 'produtos.php';
      break;

    case "noticias":
      include 'noticias.php';
      break;

    case "receitas":
      include 'receitas.php';
      break;

    case "eventos":
      include 'eventos.php';
      break;

    case "posts_sobreChocolate":
      include 'posts_sobreChocolate.php';
      break;

    case "posts_curiosidades";
      include 'posts_curiosidades.php';
      break;

    case "eventos_proximos";
      include 'eventos_proximos.php';
      break;

    case "eventos_visitacao";
      include 'eventos_visitacao.php';
      break;

    case "eventos_cursos";
      include 'eventos_cursos.php';
      break;

    case "eventos_podcasts";
      include 'eventos_podcasts.php';
      break;

    case "autor_card";
      include 'autor_card.php';
      break;

    case "produtos_card";
      include 'produtos_card.php';
      break;

    case "marcas_especializadas";
      include 'marcas_especializadas.php';
      break;

    case "marcas_parceiras";
      include 'marcas_parceiras.php';
      break;

    case "marcas_slug";
      include 'marcas_slug.php';
      break;

    case "receitas_slug";
      include 'receitas_slug.php';
      break;

    case "produtos_listaSemCatalogo";
      include 'produtos_listaSemCatalogo.php';
      break;

    case "eventos_slug";
      include 'eventos_slug.php';
      break;

    case "posts_categoria";
      include 'posts_categoria.php';
      break;

    case "empresa":
      include 'empresa.php';
      break;

    case "login":
      include 'login.php';
      break;

    case "configuracao/verifica":
      include 'login_verifica.php';
      break;

    case "aplicativo":
      include 'aplicativo.php';
      break;

    case "menu":
      include 'menu.php';
      break;

    case "menuprograma":
      include 'menuprograma.php';
      break;

    case "montaMenu":
      include 'montaMenu.php';
      break;

    case "loginaplicativo":
      include 'loginaplicativo.php';
      break;

    case "usuario":
      include 'usuario.php';
      break;

/*     case "atendente":
      include 'atendente.php';
      break; */

    default:
      $jsonSaida = json_decode(
        json_encode(
          array(
            "status" => "400",
            "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
          )
        ),
        TRUE
      );
      break;
  }
}

if ($metodo == "PUT") {
  switch ($funcao) {

    case "paginas":
      include 'paginas_inserir.php';
      break;

    case "secoes":
      include 'secoes_inserir.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_inserir.php';
      break;

    case "marcas":
      include 'marcas_inserir.php';
      break;

    case "posts":
      include 'posts_inserir.php';
      break;

    case "banners":
      include 'banners_inserir.php';
      break;

    case "temas":
      include 'temas_inserir.php';
      break;

    case "autor":
      include 'autor_inserir.php';
      break;

    case "categorias":
      include 'categorias_inserir.php';
      break;

    case "produtos":
      include 'produtos_inserir.php';
      break;

    case "noticias":
      include 'noticias_inserir.php';
      break;

    case "receitas":
      include 'receitas_inserir.php';
      break;

    case "eventos":
      include 'eventos_inserir.php';
      break;

    case "empresa":
      include 'empresa_inserir.php';
      break;

    case "usuario":
      include 'usuario_inserir.php';
      break;

    case "aplicativo":
      include 'aplicativo_inserir.php';
      break;

    case "menu":
      include 'menu_inserir.php';
      break;

    case "menuprograma":
      include 'menuprograma_inserir.php';
      break;

    case "loginaplicativo":
      include 'loginaplicativo_inserir.php';
      break;

    case "login":
      include 'login_inserir.php';
      break;

    default:
      $jsonSaida = json_decode(
        json_encode(
          array(
            "status" => "400",
            "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
          )
        ),
        TRUE
      );
      break;
  }
}

if ($metodo == "POST") {
  if ($funcao == "login" && $parametro == "ativar") {
    $funcao = "configuracao/ativar";
    $parametro = null;
  }

  switch ($funcao) {

    case "perfil":
      include 'perfil_alterar.php';
      break;

    case "paginas":
      include 'paginas_alterar.php';
      break;

    case "secoes":
      include 'secoes_alterar.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_alterar.php';
      break;


    case "temas":
      include 'temas_alterar.php';
      break;

    case "autor":
      include 'autor_alterar.php';
      break;

    case "marcas":
      include 'marcas_alterar.php';
      break;

    case "categorias":
      include 'categorias_alterar.php';
      break;

    case "produtos":
      include 'produtos_alterar.php';
      break;

    case "noticias":
      include 'noticias_alterar.php';
      break;

    case "receitas":
      include 'receitas_alterar.php';
      break;

    case "eventos":
      include 'eventos_alterar.php';
      break;

    case "posts":
      include 'posts_alterar.php';
      break;

    case "empresa":
      include 'empresa_alterar.php';
      break;

    case "usuario":
      include 'usuario_alterar.php';
      break;

    case "aplicativo":
      include 'aplicativo_alterar.php';
      break;

    case "menu":
      include 'menu_alterar.php';
      break;

    case "menuprograma":
      include 'menuprograma_alterar.php';
      break;

    case "loginaplicativo":
      include 'loginaplicativo_alterar.php';
      break;

    case "configuracao/ativar":
      include 'login_ativar.php';
      break;

    case "login":
      include 'login_alterar.php';
      break;
    default:
      $jsonSaida = json_decode(
        json_encode(
          array(
            "status" => "400",
            "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
          )
        ),
        TRUE
      );
      break;
  }
}

if ($metodo == "DELETE") {
  switch ($funcao) {

    case "paginas":
      include 'paginas_excluir.php';
      break;

    case "secoes":
      include 'secoes_excluir.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_excluir.php';
      break;

    case "marcas":
      include 'marcas_excluir.php';
      break;

    case "posts":
      include 'posts_excluir.php';
      break;

    case "banners":
      include 'banners_excluir.php';
      break;

    case "temas":
      include 'temas_excluir.php';
      break;

    case "autor":
      include 'autor_excluir.php';
      break;

    case "categorias":
      include 'categorias_excluir.php';
      break;

    case "produtos":
      include 'produtos_excluir.php';
      break;

    case "noticias":
      include 'noticias_excluir.php';
      break;

    case "receitas":
      include 'receitas_excluir.php';
      break;

    case "eventos":
      include 'eventos_excluir.php';
      break;

    case "empresa":
      include 'empresa_excluir.php';
      break;

    case "menu":
      include 'menu_excluir.php';
      break;

    case "aplicativo":
      include 'aplicativo_excluir.php';
      break;

    case "menuprograma":
      include 'menuprograma_excluir.php';
      break;

    case "loginaplicativo":
      include 'loginaplicativo_excluir.php';
      break;

    case "usuario":
      include 'usuario_excluir.php';
      break;

    case "login":
      include 'login_excluir.php';
      break;

    default:
      $jsonSaida = json_decode(
        json_encode(
          array(
            "status" => "400",
            "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
          )
        ),
        TRUE
      );
      break;
  }
}
