<?php require "header.php"; ?>
<body>
<div class="container-xxl py-5">
    <a href="index.php"><button type="button" class="btn btn-secondary" style="margin-bottom: 20px;">Homepage</button></a><br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Pet Picture</b></td>
                <td><b>Pet Name</b></td>
                <td><b>Pet Type</b></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $i = 1;
                require_once "database.php";
                $userId = $_SESSION['id'];
                $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' ORDER BY petID DESC");
                foreach($rows as $row) :
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="img/<?php echo $row["petPicture"]; ?>" width="200" height="200" title="<?php echo $row["petPicture"]; ?>"></td>
                <td><?php echo $row["petName"]; ?></td>
                <td><?php echo $row["petType"]; ?></td>
                <td>
                    <a href="" class="btn btn-info">View More</a>
                    <a href="edit.php?petid=<?php echo $row["petID"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?petid=<?php echo $row["petID"]; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>