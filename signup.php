<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="signup.css">
    <title>signup</title>
    <style>
        .h1{
            line-height: 100px;
        }
    </style>
</head>

<body>

    <div class="container" id="container">  
        <div class="form-container sign-up">
            <form action="signup.php" method="post">
                <h1 class="h1">Create Account</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span> -->
                <input type="text" placeholder="Userame" name="username">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button name="bt1">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="signup.php" method="post">
                <h1 class="h1">Sign In</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div> -->
                <!-- <span>or use your email password</span> -->
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <button name="bt2">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
   <script >
        const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
    </script>
</body>

</html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['bt1'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $con->prepare("SELECT * FROM login WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $email, $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email or username already exists')</script>";
        } else {
            $sql = "INSERT INTO login (username, email, password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Registration Successful')</script>";
            }
        }
    }

    if (isset($_POST['bt2'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $con->prepare("SELECT * FROM login WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                if (!isset($_SESSION['user'])) {
                    $_SESSION['user'] = $row['username'];
                }
                header("Location:index.php");
                exit;
            } else {
                echo "<script>alert('Invalid password')</script>";
            }
        } else {
            echo "<script>alert('Invalid email')</script>";
        }
    }
}
?>