<?php 
    require "header.php"; ?>
    <main class="col-lg-10">
    <div class="ps">
        <br/><br/>
    </div>
    </main>
    <div class='-fluid' style='margin-left: 100px;'>
        <form action="accept.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-lable">Accept Reason:</label>
                <textarea placeholder="Enter any comments you like to tell the adopter:" name="acceptreason" rows="6" 
                    class="form-control" style="max-width: 800px;"></textarea>
            </div>
            <input type="hidden" name="applyid" value="<?php echo $_GET["applyID"]; ?>">
            <div class="form-btn">
                <input type="submit" value="Accept" name="accept" class="btn btn-primary">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["accept"])){
        $applyID = $_POST["applyid"];
        $acceptReason = $_POST["acceptreason"];
        include "database.php";

        $sql = "UPDATE petadopting SET applyStatus = 'Accepted', ownerCommments = '$acceptReason' WHERE applyID = '$applyID'";
        if(mysqli_query($conn, $sql)) {
            $sql2 = "SELECT * FROM petadopting WHERE applyID = '$applyID'";
            $result = mysqli_query($conn, $sql2);
            $applyItem = mysqli_fetch_array($result);
            $petIDs = $applyItem["petsID"];
            $sql3 = "UPDATE pets SET petStatus = 'Adopted' WHERE petID = '$petIDs'";
            if(mysqli_query($conn, $sql3)) {
                echo "<div class='alert alert-success'>Accepted. Redirecting in 2 sec.</div>";
                header("refresh:2, url=userOwnPets.php?status=");
            }
            else{
                echo "<div class='alert alert-danger'>Something's wrong</div>";
            }
        }
        else{
            echo "<div class='alert alert-danger'>Something's wrong</div>";
        }
    }

    echo "</div>";

?>