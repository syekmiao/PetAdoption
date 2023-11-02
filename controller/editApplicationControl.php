<?php
    if (empty($_SESSION['id'])){
        echo "<div class='alert alert-danger'>Login details missing. Please login again, redirecing...</div>";
        header("refresh:1, url=login.php");
    }
    else {
        if(isset($_POST["edit"])){
            $fullname = $_POST["fullname"];
            $contEmail = $_POST["contactEmail"];
            $contPhone = $_POST["contactPhone"];
            $address = $_POST["address"];
            $ownPets = $_POST["ownPets"];
            $house = $_POST["house"];
            $othersAgree = $_POST["othersAgreement"];
            $reason = $_POST["reason"];
            //$userId = $_SESSION['id'];
            $applyID = $_POST['applyID'];

            $errors = array();

            if (empty($fullname) OR empty($contEmail) OR empty($contPhone) OR empty($address) OR empty($ownPets) OR
                empty($house) OR empty($othersAgree) OR empty($reason) ){
                    array_push($errors, "All fields are required");
                    //echo '<script>alert("All fields are required");</script>';
                }
            if(!filter_var($contEmail, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Email is not valid");
                //echo '<script>alert("Email is not valid");</script>';
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
                $sql1 = "UPDATE petAdopting SET applyName = '$fullname', applyEmail = '$contEmail', applyPhone = '$contPhone', 
                    applyAddress = '$address', ownPets = '$ownPets', house = '$house', otherAgrees = '$othersAgree', 
                    applyReason = '$reason' WHERE applyID = '$applyID' ";
                
                if (mysqli_query($conn, $sql1)){
                    echo "<div class='alert alert-success'>Updated Succesfully</div>";
                    header("refresh:3, url=userApplication.php");

                }
                else{
                    die("Something went wrong.");
                }      
            }
        }
    }
?>