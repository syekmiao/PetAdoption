<?php 
    require "adminHeader.php"; 
?>

        <div class='container-fluid' style='margin-left: 100px;'>
        <?php 
            if(isset($_POST["add"])){
                $title = $_POST["title"];
                $type = $_POST["type"];
                $information = $_POST["information"];
                $adminid = $_POST["adminid"];
            
                $errors = array();
        
                if (empty($title) OR empty($type) OR empty($information) ){
                        array_push($errors, "All fields are required");
                    }
                if (count($errors) > 0){
                    foreach ($errors as $error){
                        echo "<div class='alert alert-danger'>$error Redirecting...</div>";
                        echo '<meta http-equiv="Refresh" content="2, url=addInform.php">';
                    }
                }
        
                else{
                    require_once "../database.php";
                    $userId = $_SESSION['id'];
        
                    $sql1 = "SELECT * FROM users WHERE userID = '$userId'";
                    $result = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_array($result);
        
                    $checkAdmin = $row['userrole'];
        
                    if ($checkAdmin == 'admin'){
                        $sql = "INSERT INTO information (infoTitle, infoType, infoData) VALUES (?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                        if ($preparestmt){
                            mysqli_stmt_bind_param($stmt, "sss", $title, $type, $information);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'>Added Succesfully</div>";
                            echo '<meta http-equiv="Refresh" content="2, url=admin.php">';
        
                        }else{
                            echo "<div class='alert alert-danger'>Something went wrong.</div>";
                            die("Something went wrong.");
                        }
                    }
                    else{
                        echo "<div class='alert alert-danger'>Something went wrong.</div>";
                        die("Something went wrong.");
                    }
                    
                }
            }
        ?>
            <form action="addInform.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-lable">Title: </label>
                    <input type="text" placeholder="The title of the pet care information: " name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-lable">Type of pet: </label>
                    <select class="form-select" name="type">
                        <option selected disabled>Select the type of pets that this information is written for:</option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="other">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-lable"></label>
                    <textarea placeholder="The pet care information/tips/tricks: " name="information" rows="20" 
                        class="form-control" style="max-width: 800px;"></textarea>
                </div>
                <input type="hidden" name="adminid" value="<?php echo $_SESSION["id"]; ?>">
                <div class="form-btn">
                    <input type="submit" value="Add" name="add" class="btn btn-primary">
                </div>
            </form>
        </div>
