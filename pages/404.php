<?php include __DIR__ . '/includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mt-4">
            <img class="mb-4 img-error" src="<?= getenv('APP_URL'); ?>/public/img/error-404-monochrome.svg" height="150" width="150" />
            <p class="lead">A URL solicitada não foi encontrada neste servidor.</p>
            <a href="home">
                <i class="fas fa-arrow-left me-1"></i>Voltar ao início</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>