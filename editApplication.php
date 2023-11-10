<?php require "header.php"; ?>
<body>
    <div class="container-xxl py-5">
        <h1>Application</h1><br/>
        <?php
            require "controller/editApplicationControl.php";
        ?>
        <form action="editApplication.php" method="post" enctype="multipart/form-data">
        <?php 
            if (isset($_GET["applyID"])){
                $applyID = $_GET["applyID"];
                include "database.php";

                $sql = "SELECT * FROM petadopting WHERE applyID = '$applyID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

            }
        ?>
            <div class="form-group">
                <label class="form-lable">Full name: </label>
                <input type="text" placeholder="Enter your name: " name="fullname" class="form-control" value="<?php echo $row['applyName'];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Contact: </label>
                <input type="text" placeholder="Enter your phone number: " name="contactPhone" class="form-control" value="<?php echo $row['applyPhone'];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Address: </label>
                <input type="text" placeholder="Enter your current living address: " name="address" class="form-control" value="<?php echo $row['applyAddress'];?>">
            </div>
            <div class="form-group">
                <label class="form-lable">Do you own any pets?: </label>
                <select name="ownPets" class="form-select">
                    <option value="Yes" <?php if ($row["ownPets"] == "Yes"){echo "selected";}?>>Yes</option>
                    <option value="No" <?php if ($row["ownPets"] == "No"){echo "selected";}?>>No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Do you own or rent your home: </label>
                <select name="house" class="form-select">
                    <option value="Own" <?php if ($row["house"] == "Own"){echo "selected";}?>>Own</option>
                    <option value="Rent" <?php if ($row["house"] == "Rent"){echo "selected";}?>>Rent</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Do your family member/people living in the same house knows and agree you to adopt a pet? </label>
                <select name="othersAgreement" class="form-select">
                    <option value="Haven't ask yet" <?php if ($row["otherAgrees"] == "Haven't ask yet"){echo "selected";}?>>Haven't ask yet</option>
                    <option value="Yes" <?php if ($row["otherAgrees"] == "Yes"){echo "selected";}?>>Yes</option>
                    <option value="No" <?php if ($row["otherAgrees"] == "No"){echo "selected";}?>>No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Reason why you want to adopt the pet, and why should the current owner consider you to adopt the pet?</label>
                <textarea placeholder="You can write anything that you would like to say/clarify to the current owner." 
                    name="reason" rows="6" class="form-control"><?php echo $row['applyReason'];?></textarea>
            </div>
            <input type="hidden" name="applyID" value="<?php echo $row["applyID"]; ?>">
            <div class="form-btn">
                <input type="submit" value="Apply" name="edit" class="btn btn-primary">
            </div>
    </form>
    </div>
    

</body>
</html>