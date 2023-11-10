<?php
$userId = $_SESSION['id'];

if(isset($_POST["editUser"])){
    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $truename = $_POST["truename"];

    if(empty($username) OR empty($useremail) OR empty($truename)){
        echo "<div class='alert alert-danger'>All fields are required</div>";
    }
    if(empty($userId)){
        header("url=login.php");
    }
    
    require_once "database.php";
    $sql1 = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql1);
    $rowCount = mysqli_num_rows($result);
    if($rowCount>0){
        echo "<div class='alert alert-danger'>Username already exists! Please use another username</div>";
    }

    else{
        $sql1 = "UPDATE users SET username = '$username', userEmail = '$useremail', truename = '$truename' WHERE userID = '$userId' ";
                
        if (mysqli_query($conn, $sql1)){
            echo "<div class='alert alert-success'>Updated Succesfully. Refresh in 3 sec...</div>";
            header("refresh:3, url=user.php");

        }
        else{
            die("Something went wrong.");
        }       
    }
}
?>