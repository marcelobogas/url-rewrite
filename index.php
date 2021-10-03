<?php

use App\Core\Enviroments;

require __DIR__ . '/vendor/autoload.php';

/* carrega as variáveis de ambiente para o projeto */
Enviroments::load(__DIR__);

if (!isset($_GET['url'])) {

    /* redireciona para a págian inicial */
    header('location: home');
} else {

    /* converte a url em array */
    $url = explode('/', $_GET['url']);

    /* itera o array para pesquisar pelo diretório informado */
    for ($i = 0; $i < count($url); $i++) {

        /* verifica se existe o diretório criado */
        if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $url[0] . '.php')) {

            /* define título da página */
            define('APP_TITLE', strtoupper(str_replace('-', ' ', $url[0])));

            /* redireciona para a página de erro */
            include __DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . '404.php';
            exit;
        } else {

            /* define título da página */
            define('APP_TITLE', strtoupper(str_replace('-', ' ', $url[0])));

            /* adiciona a página se ela existir */
            include __DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $url[0] . '.php';
        }
    }
}
