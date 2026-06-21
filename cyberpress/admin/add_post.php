<?php

require_once 'includes/auth_check.php';

require_once '../includes/db.php';

$error_msg = '';
$success_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $imageName = null;

    if (empty($title) || empty($content)) {
        $error_msg = 'Title and content are required.';
    } else {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];

            $allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            $maxSize = 2 * 1024 * 1024;

            if (!in_array($fileType, $allowedFileTypes)) {
                $error_msg = 'Invalid file type. Only JPG, JPEG, PNG, and WEBP are allowed.';
            } elseif ($fileSize > $maxSize) {
                $error_msg = 'File size exceeds the maximum limit of 2MB.';
            } else {
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $imageName = time() . '_' . uniqid() . '.' . $fileExtension;

                $uploadFileDir = '../assets/uploads/';
                $dest_path = $uploadFileDir . $imageName;

                if (!move_uploaded_file($fileTmpPath, $dest_path)) {
                    $error_msg = 'There was an error moving the uploaded file.';
                }
            }
        }

        if (empty($error_msg)) {
            try {
                $sql = "INSERT INTO posts (title, content, image) VALUES (:title, :content, :image)";
                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    ':title' => $title,
                    ':content' => $content,
                    ':image' => $imageName
                ]);

                $success_msg = 'Post added successfully.';
            } catch (PDOException $e) {
                $error_msg = 'Error occurred while adding the post. ' . $e->getMessage();
            }
        }
    }
}

include '../includes/header.php';

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
            <div class="card-header bg-white border-bottom py-3">
                <h4 class="mb-0 text-primary">Add New Post</h4>
            </div>

            <div class="card-body p-4">
                <?php if (!empty($error_msg)) : ?>
                    <div class="alert alert-danger"><i class="bi bi-exclamation-triangle"></i> <?php echo $error_msg; ?></div>
                <?php endif; ?>
                <?php if (!empty($success_msg)) : ?>
                    <div class="alert alert-success"><i class="bi bi-check-circle"></i> <?php echo $success_msg; ?></div>
                <?php endif; ?>

                <form method="POST" action="add_post.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" required placeholder="Title">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Image (optional)</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .webp">

                        <div class="form-text">Allowed file types: JPG, JPEG, PNG, WEBP. Max size: 2MB.</div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content" rows="10" required placeholder="Content"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>