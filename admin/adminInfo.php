<?php require "adminHeader.php"; 
?>
<main class="col-lg-10">
    <div class="ps">
        <br/><br/><h1>All Pet Care Info Listing</h1>
    </div>
</main>
</div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Info ID </b></td>
                <td><b>Info Title</b></td>
                <td><b>Pet Type</b></td>
                <td><b>Created Date</b></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $i = 1;
                require_once "../database.php";
                if(empty($_SESSION['id'])){
                    echo "<div class='alert alert-danger'>Login expired, please login again. Refresh in 1 sec...</div>";
                    echo '<meta http-equiv="Refresh" content="2, url=login.php">';
                }
                else{
                    //$userId = $_SESSION['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM information ORDER BY infoID ASC");
                    foreach($rows as $row) :
            ?>
            <tr>
                <td><?php echo $row["infoID"]; ?></td>
                <td><?php echo $row["infoTitle"]; ?></td>
                <td><?php echo $row["infoType"]; ?></td>
                <td><?php echo $row["infoDate"]; ?></td>
                <td>
                    <a href="editInfo.php?infoID=<?php echo $row["infoID"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="deleteinfo.php?infoID=<?php echo $row["infoID"]; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
</div>


</div>
</body>
</html>