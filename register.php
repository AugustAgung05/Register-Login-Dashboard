<?php
include "Service/database.php";
session_start();

$register_message = "";
$failed_register = "";

if (isset($_SESSION["isLogin"])){
    header("Location: dashboard.php");
}

if (isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash_password = hash("sha256", $password);
     try{
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";
        if ($db->query($sql)){
            $register_message = "Akun berhasil di daftarkan, silahkan login";
        } else {
            $failed_message = "gagal mendaftarkan akun, silahkan coba lagi";
        }
     }catch(mysqli_sql_exception $e){
        $failed_register = "Nama pengguna sudah digunakan";
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
    
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">    
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST" autocomplete="off">
            <h1>Register</h1>
            <p class="message register-message"><?php if(empty($failed_register)) : echo $register_message; endif; ?></p>
            <p class="message"><?php if(empty($register_message)) : echo $failed_register; endif; ?></p>
            <div class="input-box">
                <i class='bx bxs-user'></i>            
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>

            <div class="input-box" id="input-box">
                <span><i class="bx bxs-lock-alt"></i></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="eye" id="eye-close" hidden><i class='bx bx-hide'></i></span>
                <span class="eye" id="eye-open" hidden><i class='bx bx-show'></i></i></span>
            </div>
            <button type="submit" class="btn" name="register">Create Account</button>
            <div class="register">
                <p class=>Already Registered? <a href="login.php">Login</a></p>
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