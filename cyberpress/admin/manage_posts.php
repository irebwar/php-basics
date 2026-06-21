<?php

require_once 'includes/auth_check.php';
require_once '../includes/db.php';

try {
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY id DESC");
    $posts = $stmt->fetchAll();
} catch (\PDOException $e) {
    die('Error fetching posts: ' . $e->getMessage());
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
                <h4 class="mb-0 text-primary">بەڕێوەبردنی بابەتەکان</h4>
            </div>

            <div class="card-body p-4">
                <?php if (isset($msg)) : ?>
                    <div class="alert alert-info"><i class="bi bi-info-circle"></i> <?php echo htmlspecialchars($_GET['msg']); ?></div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ناونیشان</th>
                                <th scope="col">وێنە</th>
                                <th scope="col">کردارەکان</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post) : ?>
                                <tr>
                                    <td>
                                        <?php echo $post['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($post['image'])) : ?>
                                            <img src="../assets/uploads/<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image" class="img-thumbnail" style="max-width: 100px;">
                                        <?php else : ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?');"><i class="bi bi-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($posts)) : ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No posts found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>