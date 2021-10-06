<?php

use App\Core\Enviroments;

require __DIR__ . '/vendor/autoload.php';

/* carrega as variáveis de ambiente para o projeto */
Enviroments::load(__DIR__);

/* inclui a página inicial */
$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';

/* define os diretórios para verificação de url */
$diretorio = 'pages';
$diretorioActions = 'app/Actions';

/* definição de páginas permitidas */
$paginasPermitidas = array('404', 'home', 'produto', 'usuario');

if (substr_count($url, '/') > 0) {

    /* converte a url em array */
    $url = explode('/', $url);

    /* define título da página */
    define('APP_TITLE', $url);

    /* verifica se a página requisitada existe */
    $pg = (file_exists("{$diretorio}/" . $url[0] . '.php')) && in_array($url[0], $paginasPermitidas) ? $url[0] : '404';
} else {

    /* define título da página */
    define('APP_TITLE', strtoupper($url));

    $pg = (file_exists("{$diretorio}/" . $url . '.php')) && in_array($url, $paginasPermitidas) ? $url : '404';
}

/* adiciona a página */
require("{$diretorio}/{$pg}.php");
