<?php
session_start();
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">    
</head>
<body>
    <div class="container dashboard">
        <form action="dashboard.php" method="POST">
            <h1>Dashboard</h1>
            <table class="table-container">
                <tr>
                    <th class="table-head">Username</th>
                    <td class="space"></td>
                    <td class="table-info"><?= $_SESSION["username"]?></td>
                </tr>
                <tr>
                    <th class="table-head">Created</th>
                    <td class="space"></td>
                    <td class="table-info"><?= $_SESSION["created_at"]?></td>
                </tr>
                <tr>
                    <th class="table-head">Login</th>
                    <td class="space"></td>
                    <td class="table-info"><?= $_SESSION["login_at"]?></td>
                </tr>
            </table>

            <button type="submit" class="btn logout" name="logout">Logout</button>
            <div class="nav-container">
                <button type="submit" class="btn"><a href="register.php">Register</a></button>
                <button type="submit" class="btn"><a href="login.php">Login</a></button>
            </div>
        </form>
    </div>