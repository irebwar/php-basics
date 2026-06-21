<?php

require_once 'includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ناونیشانی بابەت هەڵەیە.";
    exit;
}

$post_id = (int)$_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $post_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo "بابەت نەدۆزرایەوە.";
        exit;
    }
} catch (PDOException $e) {
    echo "هەڵەیەک ڕوویدا: " . $e->getMessage();
    exit;
}

require_once 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <a href="index.php" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> گەڕانەوە
        </a>

        <article class="card shadow-sm border-0">
            <?php if ($post['image']) : ?>
                <img src="assets/uploads/<?php echo htmlspecialchars($post['image']);?>" class="card-img-top" alt="<?php echo htmlspecialchars($post['title']);?>" style="max-height: 400px; object-fit: cover;">
            <?php endif; ?>
            
            <div class="card-body p-4 p-md-5">
                <h1 class="card-title mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
                <p class="text-muted mb-4"><i class="bi bi-calendar3"></i> <?php echo date('Y-m-d', strtotime($post['create_at'])); ?></p>
                <div class="card-text">
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </div>
            </div>
        </article>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>