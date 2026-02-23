<?php
define('SUBDIRETORIO','/');
/*
 * ALTERAR .htaccess
 * ALTERAR require "/site_novo/"
 * ALTERAR "site_novo/" nas funções.pgp
 */

/* CHAMANDO A CLASSE DE SESSÃO ($session) */
/* $session->id = 666 // Instancia o id como 666 */
/* $session->id // Retorna o valor setado ou retorna null */
/* $session->getAll() // Retorna todos os valores setados na sessão */
/* $session->destroy() // Oblitera todos os valores setados na sessão */
/* CHAMANDO A CLASSE DE SESSÃO ($session) */
//define('RUN_MODE_PRODUCTION', true); // in live mode
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
// require_once $_SERVER['DOCUMENT_ROOT']."/classes/Session.php";

/* PROTOCOLO CASO UTILIZE HTTPS VOCÊ PRECISARÁ UTILIZAR EM TODOS OS LOCAIS USO PARA O GOOGLE FONTS */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

/* CHAMANDO O ARQUIVO DE FUNCÕES */
// require_once $_SERVER['DOCUMENT_ROOT']."/funcoes/funcoes.php";

/* CHAMANDO O ARQUIVO DE BANCO DE DADOS */
// require_once raiz("funcoes/dbaccess.php");

/* CHAMANDO AS METATAGS PADRÃO */
// require_once raiz("template_site/metatags.php");

/* REESCREVENDO AS METATAGS PADRÃO COM O VALOR QUE PRECISO PARA A PÁGINA */
// $data_metatags =  array(
//     'titulo' => 'RC Trade MKT | 2337-9000',
//     'meta_description' => '',
//     'meta_keywords' => '',
//     'imagem_compartilhamento' => '',
//     'tipo_imagem_compartilhamento' => 'image/jpeg',
//     'width_imagem_compartilhamento' => '480',
//     'height_imagem_compartilhamento' => '480',
//     'robots' => 'index, follow'
// );

/* SUBSTITUINDO O VALOR PADRÃO PELO VALOR DA VARIÁVEL $data_metatags */
// $metatags = array_replace($metatags, $data_metatags);

/* DEFININDO O MENU ATUAL COMO ATIVO */
$menu_ativo['index'] = 'current';

// CRIANDO UMA FNÇÃO PARA COMPRIMIR A SAIDA DO HTML
function ob_html_compress($buf){
    return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}

// CHAMANDO ELA
ob_start("ob_html_compress");

require_once ("siterc-aguarde/index.html");
// require_once raiz("template_site/header.php");
// require_once raiz("template_site/menu.php");
// require_once raiz("template_paginas/home.php");
// require_once raiz("template_site/footer.php");

// ENCERRANDO A FUNÇÃO
ob_end_flush();

?>

