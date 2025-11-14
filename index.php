<!DOCTYPE html>
<html>
<head>
    <title>PHP Basics</title>
</head>
<body>
    <h1>Welcome to my Website</h1>
    <?php
        $username = "JohnDoe";
        $message = "Welcome back,";

        echo $message . " " . $username . "!";
    ?>

    <p>Server time:
        <strong>
            <?php
                echo date("Y-m-d H:i:s");
            ?>
        </strong>
    </p>
</body>
</html>