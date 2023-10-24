<?php
    $userId = $_SESSION['id'];

    if(isset($_POST["add"])){
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
                echo "<div class='alert alert-danger'>$error</div>";
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
                $sql = "INSERT INTO pets
                        (petName, petType, petPicture, petAge, petBreed, vaccination, deworm, spray, petSize, petColor, petInformation, userID)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt){
                        mysqli_stmt_bind_param($stmt, "ssssssssssss", 
                            $petname, $petType, $newImageName, $petage, $breed, $vaccinate, $deworm, $spray, $size, $color, $information, $userId);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Added Succesfully</div>";

                    }else{
                        die("Something went wrong.");
                    }
            }
        }
    }
?>