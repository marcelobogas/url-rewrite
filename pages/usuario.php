<?php

use App\WebService\ViaCep;

include __DIR__ . '/includes/header.php';

if (isset($_GET['url'])) {

    /* obtém os dados da url e converte em array */
    $dadosCep = explode('/', $_GET['url']);

    /* executa a consulta */
    $cep = ViaCep::consultarCep($dadosCep[2]);

    /* obtém o nome do estado*/
    $estado = ViaCep::getEstado($cep['uf']);
}
?>

<div class="p-3">
    <div class="row g-3 pt-3">
        <div class="col-md-2">
            <label for="inputZip" class="form-label">CEP</label>
            <input type="text" class="form-control form-control-sm" id="inputZip" value="<?= isset($cep['cep']) ? $cep['cep'] : ''; ?>" maxlength="9">
        </div>
        <a href="usuario/cep/01001001">
            <div class="col-10 p-4">
                <button type="button" class="btn btn-sm btn-primary">Buscar Cep</button>
            </div>
        </a>
    </div>
    <div class="row g-3 pb-3">
        <div class="col-8">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input type="text" class="form-control form-control-sm" id="inputAddress" value="<?= isset($cep['cep']) ? $cep['logradouro'] : ''; ?>">
        </div>
        <div class="col-4">
            <label for="inputAddress2" class="form-label">Complemento</label>
            <input type="text" class="form-control form-control-sm" id="inputAddress2" value="">
        </div>
        <div class="col-3">
            <label for="inputAddress" class="form-label">Número</label>
            <input type="text" class="form-control form-control-sm" id="inputAddress" value="<?= isset($cep['cep']) ? $cep['complemento'] : ''; ?>">
        </div>
        <div class="col-5">
            <label for="inputAddress2" class="form-label">Bairro</label>
            <input type="text" class="form-control form-control-sm" id="inputAddress2" value="<?= isset($cep['cep']) ? $cep['bairro'] : ''; ?>">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Cidade</label>
            <input type="text" class="form-control form-control-sm" id="inputCity" value="<?= isset($cep['cep']) ? $cep['localidade'] : ''; ?>">
        </div>
        <div class="col-md-3">
            <label for="inputCity" class="form-label">Estado</label>
            <input type="text" class="form-control form-control-sm" id="inputCity" value="<?= isset($cep['cep']) ? $estado : ''; ?>">
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>