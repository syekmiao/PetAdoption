<?php require "adminHeader.php"; 
?>
<main class="col-lg-10">
    <div class="ps">
        <br/><br/><h1>All Pets Listing</h1>
    </div>
</main>
</div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Pet ID</b></td>
                <td><b>Pet Picture</b></td>
                <td><b>Pet Name</b></td>
                <td><b>Pet Type</b></td>
                <td><b>Pet Age</b></td>
                <td><b>Pet Breed</b></td>
                <td><b>Created Date</b></td>
                <td><b>Pet Status</b></td>
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
                    $rows = mysqli_query($conn, "SELECT * FROM pets ORDER BY petID ASC");
                    foreach($rows as $row) :
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["petID"]; ?></td>
                <td><img src="../img/<?php echo $row["petPicture"]; ?>" width="200" height="200" title="<?php echo $row["petPicture"]; ?>"></td>
                <td><?php echo $row["petName"]; ?></td>
                <td><?php echo $row["petType"]; ?></td>
                <td><?php echo $row["petAge"]; ?></td>
                <td><?php echo $row["petBreed"]; ?></td>
                <td><?php echo $row["petCreateDate"]; ?></td>
                <td><?php echo $row["petStatus"]; ?></td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
</div>


</div>
</body>
</html>