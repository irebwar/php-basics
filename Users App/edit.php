<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username = :uname, email = :uemail WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':uname' => $username, ':uemail' => $email, ':id' => $id]);

    header("Location: index.php");
}

?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id'];?>">
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <input type="email" name="email" value="<?php echo $user['email'];?>" required>
    <button type="submit" name="update">Update</button>
</form>