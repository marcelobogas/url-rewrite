<?php 

include __DIR__ . '/includes/header.php'; 




?>

<div class="text-center p-5 bg-primary text-light">
    <h1><?= APP_TITLE; ?></h1>
</div>

<?php

echo '<pre>';
print_r($_GET['url']);
echo '</pre>';

?>

<?php include __DIR__ . '/includes/footer.php'; ?>