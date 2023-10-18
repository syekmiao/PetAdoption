<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container">
        <?php
        //print_r($_POST);
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $email = $_POST["email"];
                $truename = $_POST["truename"];
                $userrole = "user";
                $password = $_POST["password"];
                $confPassword = $_POST["conf_password"];

                $passworHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if (empty($username) OR empty($email) OR empty($password) OR empty($confPassword) OR empty($truename)) {
                    array_push($errors, "All fields are required");
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    array_push($errors, "Email is not valid");
                }
                if(strlen($password)< 8){
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if($password !== $confPassword){
                    array_push($errors, "Password does not match");
                }

                require_once "database.php";
                $sql1 = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $sql1);
                $rowCount = mysqli_num_rows($result);
                if($rowCount>0){
                    array_push($errors, "Username already exists! Please use another username");
                }

                $sql2 = "SELECT * FROM users WHERE userEmail = '$email'";
                $result2 = mysqli_query($conn, $sql2);
                $rowCount = mysqli_num_rows($result2);
                if($rowCount>0){
                    array_push($errors, "Email already exists! Please use another email");
                }

                if (count($errors) > 0){
                    foreach ($errors as $error){
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }else{
                    // insert data into database
                    

                    //echo "<div class='alert alert-danger'>Database connected</div>";
                    $sql = "INSERT INTO users(username, userEmail, truename, userrole, userPass) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt){
                        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $truename, $userrole, $passworHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Registered Succesfully</div>";

                    }else{
                        die("Something went wrong.");
                    }
                } 
            }
        ?>
        <h1>Register</h1><br/>
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="truename" placeholder="Name:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
                <span id="passwordHelpInline" class="form-text">
                    Must be more than 8 characters long.
                </span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <br/><span id="linkToLoginPage" class="form-text">
                Already have an account? Click <a href="login.php">HERE</a> to login.
            </span>
            
        </form>
    </div>
</body>
</html>