<?php 
    require "adminHeader.php"; 
    if(empty($_POST["editTest"])){
        if(empty($_GET["infoID"])){
            echo '<meta http-equiv="Refresh" content="0, url=adminInfo.php">';
        }
    }
?>

        <div class='container-fluid' style='margin-left: 100px;'>
        <?php 
            if(isset($_POST["edit"])){
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
                        echo '<meta http-equiv="Refresh" content="2, url=editInfo.php">';
                    }
                }

        
                else{
                    require_once "../database.php";
                    $sql1 = "UPDATE pets SET petName = '$title', petType = '$type', petPicture = '$information' WHERE petID = '$petIDs' ";
                
                    if (mysqli_query($conn, $sql1)){
                        echo "<div class='alert alert-success'>Updated Succesfully</div>";
                        echo '<meta http-equiv="Refresh" content="2, url=adminInfo.php">';

                    }
                    else{
                        die("Something is wrong.");
                    }
            
                }
            }
        ?>
            <form action="editInfo.php" method="post" enctype="multipart/form-data">
                <?php 
                    $infoID = $_GET["infoID"];
                    include "../database.php";
                    
                    $sql = "SELECT * FROM information WHERE infoID = '$infoID'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    
                ?>
                <div class="form-group">
                    <label class="form-lable">Title: </label>
                    <input type="text" placeholder="The title of the pet care information: " name="title" class="form-control"
                    value="<?php echo $row['infoTitle'];?>">
                </div>
                <div class="form-group">
                    <label class="form-lable">Type of pet: </label>
                    <select class="form-select" name="type">
                        <option selected disabled>Select the type of pets that this information is written for:</option>
                        <option value="dog"  <?php if ($row["infoType"] == "dog"){echo "selected";}?>>Dog</option>
                        <option value="cat" <?php if ($row["infoType"] == "cat"){echo "selected";}?>>Cat</option>
                        <option value="other" <?php if ($row["infoType"] == "dog"){echo "selected";}?>>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-lable"></label>
                    <textarea placeholder="The pet care information/tips/tricks: " name="information" rows="20" 
                        class="form-control" style="max-width: 800px;"><?php echo $row['infoData'];?></textarea>
                </div>
                <input type="hidden" name="editTest" value="<?php echo $row['infoID'];?>">
                <div class="form-btn">
                    <input type="submit" value="Edit" name="edit" class="btn btn-primary">
                </div>
            </form>
        </div>
