<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
            if(isset($_POST['login'])) {
                $loginusername = $_POST['username'];
                $loginpassword = $_POST['password'];
                require_once "database.php";
                $sql1 = "SELECT * FROM users WHERE username = '$loginusername'";
                $result1 = mysqli_query($conn, $sql1);
                $login = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                if($login){
                    if(password_verify($loginpassword, $login["userPass"])){
                        $_SESSION['name'] = $login["username"];
                        header("Location: index.php");
                        echo "<div class='alert alert-success'>Login successfull</div>";
                        die();
                    }
                    else{
                        echo "<div class='alert alert-danger'>The password does not match</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>This username does not exists</div>";
                }
            }

        ?>
        <h1>Login</h1><br/>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter username: " name="username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter password: " name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            <br/><span id="linkToLoginPage" class="form-text">
                Didn't have an account? Click <a href="register.php">HERE</a> to register.
            </span>
        </form>
    </div>
</body>
</html>