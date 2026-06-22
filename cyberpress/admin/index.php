<?php
require_once '../includes/header.php';
require_once 'includes/auth_check.php';
?>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group shadow-sm">
            <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                <i class="bi bi-speedometer2 me-2"></i> داشبورد
            </a>
            <a href="add_post.php" class="list-group-item list-group-item-action">
                <i class="bi bi-pencil-square me-2"></i> زیادکردنی بابەت
            </a>
            <a href="manage_posts.php" class="list-group-item list-group-item-action">
                <i class="bi bi-list-task me-2"></i> بەڕێوەبردنی بابەتەکان
            </a>

            <a href="message.php" class="list-group-item list-group-item-action">
                <i class="bi bi-envelope-paper me-2"></i> سندوقی پەیامەکان
            </a>
            <a href="../logout.php" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-right me-2"></i> چوونەژورەوە
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">بەخێربێیت بۆ داشبوردی بەڕێوەبەر</h5>
                <p class="card-text">لەوێت دەتوانیت بابەتەکان زیاد بکەیت، بەڕێوەبەرایەتی بکەیت و</p>
                <hr>
                <div class="row text-center mt-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-primary text-white rounded-3">
                            <h1 class="mb-0">12</h1>
                            <p class="mb-0">بابەتەکان</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-success text-white rounded-3">
                            <h1 class="mb-0">1250</h1>
                            <p class="mb-0">سەردانیکەران</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>