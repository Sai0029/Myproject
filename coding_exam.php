<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
        }

        body {
            background-color: #435165;
        }

        .login {
            width: 400px;
            background-color: #ffffff;
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
            margin: 100px auto;
        }

        .login h1 {
            text-align: center;
            color: #5b6574;
            font-size: 24px;
            padding: 20px 0 20px 0;
            border-bottom: 1px solid #dee0e4;
        }

        .login form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 20px;
        }

        .login form label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #3274d6;
            color: #ffffff;
        }

        .login form input[type="password"],
        .login form input[type="text"] {
            width: 310px;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .login form input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #3274d6;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            transition: background-color 0.2s;
        }

        .login form input[type="submit"]:hover {
            background-color: #2868c7;
            transition: background-color 0.2s;
        }

        .message {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="email">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="email" placeholder="Email" id="email" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" name="submit" value="Login">
        </form>
        <?php
        session_start();
        include("php/config.php");

        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $result = mysqli_query($con,"SELECT * FROM student_users WHERE mail='$email' AND password='$password'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['mail'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['age'] = $row['age'];
                $_SESSION['id'] = $row['id'];
                header("Location: http://localhost:8080/");
                exit(); // Make sure to exit after redirection
            }else{
                echo "<div class='message'>Wrong Email or Password</div>";
            }
        }
        ?>
    </div>
</body>
</html>
