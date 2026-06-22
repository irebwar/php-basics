<?php

require_once 'includes/db.php';

$query = isset($_GET['query']) ? trim($_GET['query']) : '';

$secret_code = '#CyberAdmin2026'; // Replace with your actual secret code

if ($query === $secret_code) {
    // Redirect to the admin panel
    header('Location: login.php');
    exit();
}

require_once 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-8 text-center py-5">
        <h2 class="mb-4">ئەنجامی گەڕان: <span class="text-primary"><?php echo htmlspecialchars($query); ?></span></h2>

        <div class="alert alert-warning">
            <i class="bi bi-tools"></i> سیستەمی گەڕان لە ئیستادا کار ناکات
        </div>
        <a class="btn btn-outline-secondary mt-3" href="index.php"><i class="bi bi-arrow-left"></i> گەڕانەوە بۆ سەرەتا</a>
    </div>
</div>