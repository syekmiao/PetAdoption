<?php
    if(empty($_SESSION['id'])){
        echo "<div class='alert alert-danger'>Login expired, please login again. Refresh in 1 sec...</div>";
        header("refresh:1, url=login.php");
    }
    else{
    $userId = $_SESSION['id'];

    if(isset($_POST["edit"])){
        $petIDs = $_POST["petid"];
        $petname = $_POST["petname"];
        $petType = $_POST["type"];
        $petage = $_POST["petage"];
        $breed = $_POST["breed"];
        $vaccinate = $_POST["vaccinate"];
        $deworm = $_POST["deworm"];
        $spray = $_POST["spray"];
        $size = $_POST["size"];
        $color = $_POST["color"];
        $information = $_POST["information"];
        $editDate = date("Y-m-d");

        $errors = array();

        
        if (empty($petname) OR empty($petage) OR empty($breed) OR empty($vaccinate) OR empty($deworm) OR empty($spray) OR
            empty($size) OR empty($color) OR empty($information)) {
                array_push($errors, "All fields are required");
        }
        if (empty($userId)){
            array_push($errors, "Please login first");
        }
        if ($_FILES['piture']['error'] === 4){
            array_push($errors, "Images does not exists");
        }
        if (count($errors) > 0){
            foreach ($errors as $error){
                echo "<div class='alert alert-danger'>$error Refresh in 1 sec...</div>";
                header("refresh:1, url=controller/editControl.php");
            }
        }
        else{
            require_once "database.php";

            $filename = $_FILES["piture"]["name"];
            $filesize = $_FILES["piture"]["size"];
            $tmpname = $_FILES["piture"]["tmp_name"];

            $validImageExtention = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $filename);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtention)){
                echo "<div class='alert alert-danger'>Invalid Image Extention</div>";
            }
            elseif($filesize > 1000000000){
                echo "<div class='alert alert-danger'>Image size is too large</div>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpname, 'img/'. $newImageName);

                $sql1 = "UPDATE pets SET petName = '$petname', petType = '$petType', petPicture = '$newImageName', petAge = '$petage',
                            petBreed = '$breed', vaccination = '$vaccinate', deworm = '$deworm', spray = '$spray', petSize = '$size',
                            petColor = '$color', petInformation = '$information', petEditDate = '$editDate' WHERE petID = '$petIDs' ";
                
                if (mysqli_query($conn, $sql1)){
                    echo "<div class='alert alert-success'>Updated Succesfully</div>";
                    header("refresh:3, url=userOwnPets.php?status=");

                }
                else{
                    die("Something went wrong.");
                }       
                        
                    
            }
        }
    }
    }
?>