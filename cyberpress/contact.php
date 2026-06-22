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
        $msg = 'Please fill in all fields.';
        $msgClass = 'alert-danger';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':subject' => $subject,
                ':message' => $message
            ]);

            $msg = 'Your message has been sent successfully!';
            $msgClass = 'alert-success';
        } catch (PDOException $e) {
            $msg = 'Error: ' . $e->getMessage();
            $msgClass = 'alert-danger';
        }
    }
}

require_once 'includes/header.php'; ?>

<div class="row justify-content-center my-5">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Contact Us</h1>
                <?php if ($msg): ?>
                    <div class="alert <?php echo $msgClass; ?>" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <form action="contact.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>