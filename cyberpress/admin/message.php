<?php

require_once 'includes/auth_check.php';

require_once '../includes/db.php';

try {
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching messages: " . $e->getMessage());
}

require_once '../includes/header.php';
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
            <a href="../logout.php" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-right me-2"></i> چوونەژورەوە
            </a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm border-0">
            <div class="card-header border-bottom py-3">
                <h4 class="mb-0 text-primary"><i class="bi bi-envelope-paper"></i> سندوقی پەیامەکان</h4>
            </div>
            <div class="card-body p-4">
                <?php if (empty($messages)): ?>
                    <div class="alert alert-info text-center">هیچ پەیامێک نییە.</div>
                <?php else: ?>
                    <div class="accordion" id="messagesAccordion">
                        <?php foreach ($messages as $msg): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#msg-<?= $msg['id'] ?>">
                                    <strong><?= htmlspecialchars($msg['name']) ?></strong>
                                    <span class="text-muted ms-2 small"> - <?php echo htmlspecialchars($msg['subject']) ?></span>
                                    </button>
                                </h2>
                                <div id="msg-<?php echo $msg['id']; ?>" class="accordion-collapse collapse"
                                data-bs-parent="#messagesAccordion">
                                    <div class="accordion-body">
                                        <p class="text-muted small border-bottom pb-2">
                                            <i class="bi bi-envelope-at"></i> -Email<a href="mailto:<?= htmlspecialchars($msg['email']) ?>" target="_blank">
                                                <?= htmlspecialchars($msg['email']) ?>
                                            </a>
                                            <i class="bi bi-calendar3 ms-3"></i> -Date <?= date("Y-m-d H:i", strtotime($msg['created_at'])) ?>
                                        </p>
                                        <p style="white-space: pre-wrap;"><?php echo nl2br(htmlspecialchars($msg['message'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>