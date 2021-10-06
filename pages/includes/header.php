<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title><?= APP_TITLE . ' - ' . strtoupper(str_replace('-', ' ', getenv('APP_NAME'))); ?></title>
</head>

<body>
    <div class="container">
        <div class="text-center p-3 bg-primary text-light">
            <h1><?php echo APP_TITLE; ?></h1>
        </div>

        <div class="text-center p-2 bg-secondary">
            <a href="<?= getenv('APP_URL')?>/home" class="text-light fw-bold pr-2">Home</a>
            <a href="<?= getenv('APP_URL')?>/usuario" class="text-light fw-bold pr-2">Usuários</a>
            <a href="<?= getenv('APP_URL')?>/produto" class="text-light fw-bold pr-2">Produtos</a>
        </div>