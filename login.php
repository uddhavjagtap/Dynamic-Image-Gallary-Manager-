<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $username = $row['username'];
    }
    $row = mysqli_fetch_assoc($result);
    //echo $row['user_role'];
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        if (isset($_SESSION['id'])) {
            header("location: home.php");
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="box">
        <div class="box-left">
            <div class="login-form">
                <!-- <div class="left-form"> -->
                <h1>Login</h1>
                <form class="login" action="login.php" method="post">
                    <input type="text" name="name" class="input-box" placeholder="Your Name"><br><br>
                    <input type="password" name="password" class="input-box" placeholder="Your Password"><br><br>
                    <input type="submit" name="login" class="btn-login" value="Login"><br>
                </form>
                <!-- </div> -->
            </div>
            <?php if (isset($error)) : ?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>
        </div>

        <div class="box-right">
            <div id="right-form" class="signup-form">
                <h1>Signup</h1><br>
                <?php
                if (isset($_SESSION['message'])) {
                    echo  $msg =  $_SESSION['message'];
                    unset($_SESSION['message']); // Clear the message to show only once
                }
                ?>
                <form class="signin" name="signup-form" id="passwordForm" action="signup.php" method="post">
                    <input type="text" name="name" class="input-box" placeholder="Your Name"><br><br>
                    <span id="passwordError"></span>
                    <input type="password" name="password" id="password" class="input-box" placeholder="Your Password"><br><br>

                    <input type="submit" name="signup" class="btn-signin" value="Signup">
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var errorElement = document.getElementById('passwordError');
            if (password.length <= 8) {
                errorElement.textContent = 'Password must be greater than 8 characters.';
                event.preventDefault();
            } else {
                errorElement.textContent = '';
            }
        });
    </script>

</body>

</html>