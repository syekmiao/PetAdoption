<?php
$userId = $_SESSION['id'];

if(isset($_POST["editUser"])){
    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $truename = $_POST["truename"];

    if(empty($username) OR empty($useremail) OR empty($truename)){
        echo "<div class='alert alert-danger'>All fields are required</div>";
    }
    else{
        require_once "database.php";
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