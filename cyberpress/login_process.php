<?php

session_start();

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'تکایە ناوی بەکارهێنەر و تێپەڕەوشە پڕ بکەوە.';
        header('Location: login.php');
        exit();
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                header('Location: admin/dashboard.php');
                exit();
            } else {
                $_SESSION['error'] = 'تێپەڕەوشە هەڵەیە.';
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'ناوی بەکارهێنەر نەدۆزرایەوە.';
            header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'هەڵەیەک ڕوویدا: ' . $e->getMessage();
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}