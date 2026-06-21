<?php

require_once 'includes/auth_check.php';
require_once '../includes/db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT image FROM posts WHERE id = :id");
        $stmt->execute([':id' => $post_id]);
        $post = $stmt->fetch();

        if ($post) {
            if (!empty($post['image'])) {
                $image_path = '../assets/uploads/' . $post['image'];
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $delete_stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
            $delete_stmt->execute([':id' => $post_id]);

            header("Location: manage_posts.php?success=Post deleted successfully");
            exit();
        } else {
            header("Location: manage_posts.php?error=Post not found");
            exit();
        }
    } catch (\PDOException $e) {
        die('Error fetching post: ' . $e->getMessage());
    }
} else {
    // Invalid ID, redirect to posts list
    header("Location: manage_posts.php?error=Invalid post ID");
    exit();
}
