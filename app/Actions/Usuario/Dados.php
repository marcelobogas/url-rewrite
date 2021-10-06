<?php

use App\WebService\ViaCep;

$cep = ViaCep::consultarCep($_GET['cep']);

echo '<pre>';
print_r($cep);
echo '</pre>';
exit;

