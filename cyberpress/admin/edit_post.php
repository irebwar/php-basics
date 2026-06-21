<?php

require_once 'includes/auth_check.php';

require_once '../includes/db.php';

$error_msg = '';
$success_msg = '';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage_posts.php?error=Invalid post ID");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute([':id' => $id]);
$post = $stmt->fetch();

if (!$post) {
    header("Location: manage_posts.php?error=Post not found");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $imageName = $post['image'];

    if (empty($title) || empty($content)) {
        $error_msg = 'Title and content are required.';
    } else {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileEcxtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $newImageName = time() . '_' . uniqid() . '.' . $fileEcxtension;
            $dest_path = '../assets/uploads/' . $newImageName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                if (!empty($post['image']) && file_exists('../assets/uploads/' . $post['image'])) {
                    unlink('../assets/uploads/' . $post['image']);
                }
                $imageName = $newImageName;
            }
        }

        try {
            $updateSql = "UPDATE posts SET title = :title, content = :content, image = :image WHERE id = :id";
            $updateStmt = $pdo->prepare($updateSql);

            $updateStmt->execute([
                ':title' => $title,
                ':content' => $content,
                ':image' => $imageName,
                ':id' => $id
            ]);

            $post['title'] = $title;
            $post['content'] = $content;
            $post['image'] = $imageName;

            $success_msg = 'Post updated successfully.';
        } catch (PDOException $e) {
            $error_msg = 'Error occurred while updating the post. ' . $e->getMessage();
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
                <h4 class="mb-0 text-primary">Edit Post</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($error_msg)) : ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error_msg); ?></div>
                <?php endif; ?>
                <?php if (!empty($success_msg)) : ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($success_msg); ?></div>
                <?php endif; ?>
                <form method="POST" enctype="multipart/form-data" action="edit_post.php?id=<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <?php if (!empty($post['image'])) : ?>
                            <div class="mb-2">
                                <img src="../assets/uploads/<?php echo htmlspecialchars($post['image']); ?>" alt="" style="max-width: 200px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
</div>