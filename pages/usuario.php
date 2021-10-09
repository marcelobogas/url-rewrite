<?php

use App\Database\Conexao;
use App\WebService\ViaCep;

include __DIR__ . '/includes/header.php';

/* inicia uma instância de conexão com o banco para a página */
try {
    /* executa a consulta no banco dedados */
    $Conexao = Conexao::getConnection();
    $query = $Conexao->query("select * from pessoas");
    $pessoas = $query->fetchAll();

    /* itera os dados da consulta */
    foreach ($pessoas as $dados) {

        /* realiza o tratamento de um campo booleano para string */
        $status = $dados['ativo'] == 1 ? 'Ativo' : 'Inativo';

        /* monta a linha com as informações */
        $pessoa = "ID: (" . $dados['id'];
        $pessoa .= ") - Nome: " . $dados['nome'];
        $pessoa .= " - " . $status;

        /* imprime o resultado da consulta */
        echo '<div class="alert alert-success text-center" role="alert">' . $pessoa . '</div>';
    }

    //Fecha a conexao com o banco de dados
    unset($Conexao);
} catch (Exception $e) {

    /* imprime o erro caso exista */
    echo '<div class="alert alert-danger text-center" role="alert">' . $e->getMessage() . '</div>';
}

/* obtém os dados da url e converte em array */
$url = explode('/', $_GET['url']);

if (count($url) > 3) {
    header('location: ' . getenv('APP_URL') . DIRECTORY_SEPARATOR . '404');
    exit;
}

/* se existir o post realiza a busca do CEP informado pelo usuário */
if (isset($_POST['inputZip'])) {
    /* executa a consulta */
    $cep = ViaCep::consultarCep($_POST['inputZip']);

    /* obtém o nome do estado*/
    $estado = ViaCep::getEstado($cep['uf']);
}
?>

<form action="usuario" method="POST" class="row g-3 pt-3">

    <div class="col-md-2">
        <label for="inputZip" class="form-label">CEP</label>
        <input type="text" class="form-control form-control-sm" id="inputZip" name="inputZip" value="<?= isset($cep['cep']) ? $cep['cep'] : ''; ?>" maxlength="9" onblur="getValueCep();">
    </div>

    <div class="col-10 p-4">
        <button type="submit" class="btn btn-sm btn-primary" id="inputGetCep" name="inputGetCep">Buscar Cep</button>
    </div>

</form>

<div class="row g-3">

    <div class="col-8 g-3">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control form-control-sm" id="inputAddress" value="<?= isset($cep['cep']) ? $cep['logradouro'] : ''; ?>">
    </div>

    <div class="col-4 g-3">
        <label for="inputAddress2" class="form-label">Complemento</label>
        <input type="text" class="form-control form-control-sm" id="inputAddress2" value="">
    </div>

    <div class="col-3 g-3">
        <label for="inputAddress" class="form-label">Número</label>
        <input type="text" class="form-control form-control-sm" id="inputAddress" value="<?= isset($cep['cep']) ? $cep['complemento'] : ''; ?>">
    </div>

    <div class="col-5 g-3">
        <label for="inputAddress2" class="form-label">Bairro</label>
        <input type="text" class="form-control form-control-sm" id="inputAddress2" value="<?= isset($cep['cep']) ? $cep['bairro'] : ''; ?>">
    </div>

    <div class="col-md-4 g-3">
        <label for="inputCity" class="form-label">Cidade</label>
        <input type="text" class="form-control form-control-sm" id="inputCity" value="<?= isset($cep['cep']) ? $cep['localidade'] : ''; ?>">
    </div>

    <div class="col-md-3 g-3">
        <label for="inputCity" class="form-label">Estado</label>
        <input type="text" class="form-control form-control-sm" id="inputCity" value="<?= isset($cep['cep']) ? $estado : ''; ?>">
    </div>

</div>

<script type="text/javascript">
    /**
     * Método responsável por obter o valor do input de CEP
     *
     * @return string
     */
    function getValueCep() {
        /* armazena o valor do input */
        var cep = document.getElementById('inputZip');

        /* retorna o valor do input */
        return cep.value;
    }

    <?php include __DIR__ . '/includes/footer.php'; ?>