<?php 
    require "header.php"; ?>
    <main class="col-lg-10">
    <div class="ps">
        <br/><br/>
    </div>
    </main>
    <div class='container-fluid' style='margin-left: 100px;'>
    <div class='-fluid' style='margin-left: 100px;'>
        <form action="reject.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-lable">Reject Reason:</label>
                <textarea placeholder="Enter any comments you like to tell the adopter:" name="rejectreason" rows="6" 
                    class="form-control" style="max-width: 800px;"></textarea>
            </div>
            <input type="hidden" name="applyid" value="<?php echo $_GET["applyID"]; ?>">
            <div class="form-btn">
                <input type="submit" value="Reject" name="reject" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>


    <?php
    if (isset($_POST["reject"])){
        $applyID = $_POST["applyid"];
        $rejectReason = $_POST["rejectreason"];
        include "database.php";

        $sql = "UPDATE petadopting SET applyStatus = 'Rejected', ownerCommments = '$rejectReason' WHERE applyID = '$applyID'";
        if(mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Rejected. Redirecting in 2 sec.</div>";
            header("refresh:2, url=userOwnPets.php?status=");
        }
        else{
            echo "<div class='alert alert-danger'>Something's wrong</div>";
        }
    }

?>