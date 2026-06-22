<?php
require_once 'includes/db.php';

$msg = '';
$msgClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $msg = "تکایە هەموو خانە پێویستەکان پڕبکەرەوە.";
        $msgClass = "alert-danger";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':subject' => $subject,
                ':message' => $message
            ]);
            
            $msg = "سوپاس! پەیامەکەت بە سەرکەوتوویی نێردرا. بەمزووانە وەڵامت دەدەینەوە.";
            $msgClass = "alert-success";
            
        } catch (PDOException $e) {
            $msg = "کێشەیەک لە سێرڤەر ڕوویدا، تکایە دواتر هەوڵبدەرەوە.";
            $msgClass = "alert-danger";
        }
    }
}

require_once 'includes/header.php';
?>

<div class="row justify-content-center my-5">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-4 text-center">
                <h2 class="mb-0 text-primary fw-bold"><i class="bi bi-envelope-paper"></i> پەیوەندیمان پێوە بکە</h2>
                <p class="text-muted mt-2">هەر پرسیار یان پێشنیارێکت هەیە، لێرەوە بۆمانی بنێرە.</p>
            </div>
            <div class="card-body p-5">
                
                <?php if ($msg != ''): ?>
                    <div class="alert <?php echo $msgClass; ?>"><i class="bi bi-info-circle"></i> <?php echo $msg; ?></div>
                <?php endif; ?>

                <form action="contact.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">ناوی تەواو <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">ئیمەیڵ <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">بابەت</label>
                        <input type="text" name="subject" class="form-control form-control-lg">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">پەیامەکەت <span class="text-danger">*</span></label>
                        <textarea name="message" class="form-control" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                        <i class="bi bi-send"></i> ناردنی پەیام
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>