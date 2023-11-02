<?php require "header.php";
    
?>

<body>
    <div class="container-xxl py-5">
        <h1>Edit pet information</h1><br/>
        <?php 
        require "controller/editControl.php";
            if (isset($_GET["petid"])){
                $petid = $_GET["petid"];
                include "database.php";

                $sql = "SELECT * FROM pets WHERE petID = '$petid'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

            }
        ?>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-lable">Pet name: </label>
                <input type="text" placeholder="Enter name of pet: " name="petname" class="form-control" value="<?php echo $row["petName"];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Type of pet: </label>
                <select class="form-select" name="type">
                    <option value="dog"  <?php if ($row["petType"] == "dog"){echo "selected";}?> >Dog</option>
                    <option value="cat"  <?php if ($row["petType"] == "cat"){echo "selected";}?> >Cat</option>
                    <option value="other" <?php if ($row["petType"] == "other"){echo "selected";}?> >Others</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet picture: </label>
                <input type="file" name="piture" accept=".jpg, .jpeg, .png" class="form-control">
                <span id="fileHelpInline" class="form-text">
                    Only Accepting .jpg .jpeg and .png files
                </span>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet age: </label>
                <input type="text" placeholder="Enter age of pet: " name="petage" class="form-control" value="<?php echo $row["petAge"];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Pet breed: </label>
                <input type="text" placeholder="Enter breed of pet: " name="breed" class="form-control" value="<?php echo $row["petBreed"];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Vaccination Status: </label>
                <select name="vaccinate" class="form-select">
                    <option value="Not Sure" <?php if ($row["vaccination"] == "Not Sure"){echo "selected";}?> >Not sure</option>
                    <option value="Yes" <?php if ($row["vaccination"] == "Yes"){echo "selected";}?> >Yes</option>
                    <option value="No" <?php if ($row["vaccination"] == "No"){echo "selected";}?> >No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Deworm Status: </label>
                <select name="deworm" class="form-select">
                    <option value="Not Sure" <?php if ($row["deworm"] == "Not Sure"){echo "selected";}?> >Not sure</option>
                    <option value="Yes" <?php if ($row["deworm"] == "Yes"){echo "selected";}?> >Yes</option>
                    <option value="No" <?php if ($row["deworm"] == "No"){echo "selected";}?> >No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Spray Status: </label>
                <select name="spray" class="form-select">
                    <option value="Not Sure" <?php if ($row["spray"] == "Not Sure"){echo "selected";}?> >Not sure</option>
                    <option value="Yes" <?php if ($row["spray"] == "Yes"){echo "selected";}?> >Yes</option>
                    <option value="No" <?php if ($row["spray"] == "No"){echo "selected";}?> >No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet body size: </label>
                <input type="text" placeholder="Enter body size of pet: (large/medium/small/fur length)" 
                    name="size" class="form-control" value="<?php echo $row["petSize"];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Pet color: </label>
                <input type="text" placeholder="Enter pet color:" name="color" class="form-control" value="<?php echo $row["petColor"];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Additional information: gender, like and dislike, potty trained or not, etc...</label>
                <textarea placeholder="Enter any extra information:" name="information" rows="6" 
                    class="form-control" value="<?php echo $row["petInformation"];?>"><?php echo $row["petInformation"];?></textarea>
            </div>
            <input type="hidden" name="petid" value="<?php echo $row["petID"]; ?>">
            <div class="form-btn">
                <input type="submit" value="Edit" name="edit" class="btn btn-primary">
            </div>
            <a href="user.php"><button type="button" class="btn btn-secondary" style="margin-top: 5px;">Back to user page</button></a><br/>
    </form>
    </div>
    

</body>
</html>