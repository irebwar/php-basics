<?php
require_once 'includes/header.php';
require_once 'includes/db.php';

try {
    $stmt = $pdo->query("SELECT * FROM posts");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "هەڵەیەک ڕوویدا: " . $e->getMessage();
}
?>

<div class="row">
    <div class="col-lg-8">
        <h2 class="mb-4 border-bottom pb-2">دوواین بابەتەکان</h2>

        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6 mb-4">
                    <div class="card post-card h-100 shadow-sm">
                        <?php if (!empty($post['image'])): ?>
                            <img src="assets/uploads/<?php echo htmlspecialchars($post['image']); ?>" class="card-img-top w-100" style="height: 60%;" alt="<?php echo htmlspecialchars($post['title']); ?>">
                        <?php else : ?>
                            <img src="https://placehold.co/600x400/transparent/F00" class="card-img-top" alt="Placeholder Image">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?php 
                                $excerpt = mb_substr($post['content'], 0, 100);
                                echo htmlspecialchars($excerpt) .  '...';
                            ?></p>
                        </div>
                        <a href="single.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-primary btn-sm mt-auto">خوێندنەوەی زیاتر</a>
                    </div>
                    <div class="card-footer bg-white text-muted small">
                        <i class="bi bi-calendar3"></i> <?php echo date('Y-m-d', strtotime($post['create_at'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">گەڕان</h5>
                    <form action="search.php" method="GET" class="d-flex">
                        <input type="text" name="query" class="form-control me-2" placeholder="گەڕان..." required>
                        <button type="submit" class="btn btn-primary">گەڕان</button>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm border-0 border-top border-warning border-4 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-warning"><i class="bi bi-currency-exchange"></i>نرخی دراوەکان</h5>
                    <p class="small text-muted">ڕاستەوخۆ لە بازاڕی کوردستان</p>
                    <div class="text-center py-3" id="currency-widget">
                        <div class="spinner-border text-muted" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="small text-muted mt-2">تکایە چاوەڕوانبە...</p>
                    </div>
                </div>
        </div>
        </div>
</div>

<?php require_once 'includes/footer.php'; ?>