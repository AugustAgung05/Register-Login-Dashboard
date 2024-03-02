<?php
include "Service/database.php";
session_start();

$login_message = "";
date_default_timezone_set('Asia/Jakarta');

if (isset($_SESSION["isLogin"])){
    header("Location: dashboard.php");
}
if (isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        $sql = "SELECT username, password, created_at FROM users WHERE BINARY username = '$username' AND BINARY password = '$hash_password'";
    
        $result = $db->query($sql);
        
        if ($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["isLogin"] = true; 
            $newFormat_created_at = date("l, d F Y H:i:s", strtotime($data["created_at"]));
            $_SESSION["created_at"] = $newFormat_created_at;
            $_SESSION["login_at"] = date("l, d F Y H:i:s");
            header("Location: dashboard.php");
        } else {
            $login_message = "Data tidak ditemukan";
        }

    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="style.css?v=<?= time()?>">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <p class="message"><?= $login_message?></p>
            <div class="input-box">
                <input type="text" name="username" id="" placeholder="Username" required>
                <i class='bx bxs-user'></i>            
            </div>

            <div class="input-box">
                <span><i class="bx bxs-lock-alt"></i></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="eye" id="eye-close" hidden><i class='bx bx-hide'></i></span>
                <span class="eye" id="eye-open" hidden><i class='bx bx-show'></i></i></span>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me?</label><a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn" name="login">Login</button>

            <div class="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>

    </div>
    <script>
        const password = document.getElementById("password");

        password.addEventListener("focus", ()=>{
            eyeClose.removeAttribute("hidden");
            
        });
        password.addEventListener("blur", ()=>{
            const eyeOpen = document.getElementById("eye-open");
            const eyeClose = document.getElementById("eye-close");
            if (password.value.length > 0){
                eyeClose.removeAttribute("hidden");
            } else {
                eyeClose.setAttribute("hidden", "");
                eyeOpen.setAttribute("hidden", "");
            }
        });
        
        const eyeOpen = document.getElementById("eye-open");
        const eyeClose = document.getElementById("eye-close");
       
        eyeClose.addEventListener("click", ()=>{
            if(password.type === "password"){
                password.type = "text";
                eyeClose.setAttribute("hidden", "");
                eyeOpen.removeAttribute("hidden");
            } else if (password.type === "text"){
                password.type = "password";
                eyeClose.setAttribute("hidden", "");
                eyeClose.removeAttribute("hidden");
            }
        });
        eyeOpen.addEventListener("click", ()=>{
            if(password.type === "text"){
                password.type = "password";
                eyeOpen.setAttribute("hidden", "");
                eyeClose.removeAttribute("hidden");
            } else if (password.type === "password"){
                password.type = "text";
                eyeOpen.setAttribute("hidden", "");
                eyeOpen.removeAttribute("hidden");
            }
        });
    </script>
</body>
</html>