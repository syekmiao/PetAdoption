<?php
    $userId = $_SESSION['id'];
    $petId = $_SESSION['petid'];
    if (empty($userId)){
        echo "<div class='alert alert-danger'>Login details missing. Please login again, redirecing...</div>";
        header("refresh:1, url=login.php");
    }
    if (empty($petId)){
        sleep(1);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    else {
        if(isset($_POST["apply"])){
            $fullname = $_POST["fullname"];
            $contPhone = $_POST["contactPhone"];
            $address = $_POST["address"];
            $ownPets = $_POST["ownPets"];
            $house = $_POST["house"];
            $othersAgree = $_POST["othersAgreement"];
            $reason = $_POST["reason"];

            $errors = array();

            if (empty($fullname) OR empty($contPhone) OR empty($address) OR empty($ownPets) OR
                empty($house) OR empty($othersAgree) OR empty($reason) ){
                    array_push($errors, "All fields are required");
                    //echo '<script>alert("All fields are required");</script>';
                }
            if(!filter_var($contPhone, FILTER_SANITIZE_NUMBER_INT)){
                array_push($errors, "Phone number is not valid");
                //echo '<script>alert("Phone number is not valid");</script>';
            }
            if (count($errors) > 0){
                foreach ($errors as $error){
                    echo "<div class='alert alert-danger'>$error Redirecting...</div>";
                    header("refresh:2, url=controller/applicationControl.php");
                }
            }

            else{
                require_once "database.php";

                $sql1 = "SELECT * FROM users WHERE userID = '$userId'";
                $result = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_array($result);
                $userEmail = $row['userEmail'];

                $sql = "INSERT INTO petAdopting
                        (applyName, applyEmail, applyPhone, applyAddress, ownPets, house, otherAgrees, applyReason, userID, petsID)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt){
                        mysqli_stmt_bind_param($stmt, "ssssssssii", 
                            $fullname, $userEmail, $contPhone, $address, $ownPets, $house, $othersAgree, $reason, $userId, $petId);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Apply Succesfully</div>";
                        unset($_SESSION['petid']);
                        header("refresh:2, url=userApplication.php");

                    }else{
                        echo "<div class='alert alert-danger'>Something went wrong.</div>";
                        die("Something went wrong.");
                    }
            }
        }
    }
?>