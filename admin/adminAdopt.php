<?php require "adminHeader.php"; 
?>
<main class="col-lg-10">
    <div class="ps">
        <br/><br/><h1>All Adopt Application Listing</h1>
    </div>
</main>
</div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Pet's Name</b></td>
                <td><b>Adopter ID</b></td>
                <td><b>Adopter Full Name</b></td>
                <td><b>Adopter Email</b></td>
                <td><b>Adopter Phone</b></td>
                <td><b>Adopter Address</b></td>
                <td><b>Adopter Reason</b></td>
                <td><b>Created Date</b></td>
                <td><b>Adopter Status</b></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $i = 1;
                require_once "../database.php";
                if(empty($_SESSION['id'])){
                    echo "<div class='alert alert-danger'>Login expired, please login again. Refresh in 1 sec...</div>";
                    header("refresh:1, url=login.php");
                }
                else{
                    //$userId = $_SESSION['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM petadopting ORDER BY applyID ASC");
                    foreach($rows as $row) :
                        $petIDs = $row["petsID"];
                        $sql5 = "SELECT * FROM pets WHERE petID = '$petIDs'";
                        $result = mysqli_query($conn, $sql5);
                        $petItem = mysqli_fetch_array($result);
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $petItem["petName"]; ?></td>
                <td><?php echo $row["applyID"]; ?></td>
                <td><?php echo $row["applyName"]; ?></td>
                <td><?php echo $row["applyEmail"]; ?></td>
                <td><?php echo $row["applyPhone"]; ?></td>
                <td><?php echo $row["applyAddress"]; ?></td>
                <td><?php echo $row["applyReason"]; ?></td>
                <td><?php echo $row["applyDate"]; ?></td>
                <td><?php echo $row["applyStatus"]; ?></td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
</div>


</div>
</body>
</html>