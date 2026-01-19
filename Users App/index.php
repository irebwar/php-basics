<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = "123456";

    $sql = "INSERT INTO users (username, email, password) VALUES (:uname, :uemail, :upass)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':uname' => $username, ':uemail' => $email, ':upass' => $password])) {
        echo "<div style='color:green'>Create Success</div>";
    } else {
        echo "<div style='color:red'>Faild</div>";
    }
}
?>

<?php
$sql = "SELECT * FROM users ORDER BY id DESC";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Create user</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="submit">Add user</button>
</form>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
           <td><?php echo $user['id']; ?></td>
           <td><?php echo $user['username']; ?></td>
           <td><?php echo $user['email']; ?></td>
           <td>
               <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
               <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sur?')">Delete</a>
           </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>