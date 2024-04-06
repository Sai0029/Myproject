<?php 
include("php/config.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    //verifying the unique email
    $verify_query = mysqli_query($con,"SELECT mail FROM student_users WHERE mail='$email'");

    if(mysqli_num_rows($verify_query) != 0 ){
        echo "<div class='message'>
                  <p>This email is used, Try another One Please!</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>"; // Added </a> to properly close the anchor tag
    }
    else{
        mysqli_query($con,"INSERT INTO student_users(username, mail, age, password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");

        echo "<div class='message'>
                  <p>Registration successfully!</p>
              </div> <br>";
        echo "<a href='home.php'><button class='btn'>Login Now</button></a>"; // Added </a> to properly close the anchor tag
    }
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Student Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register"> <!-- Removed required attribute as it's not applicable to input type submit -->
                </div>
                
                <div class="links">
                    Already a member? <a href="Stulogin.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php } ?>
