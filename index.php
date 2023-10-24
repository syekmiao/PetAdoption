<?php require "header.php"; ?>
<body>
    <h1>Homepage</h1>
    <h3>Welcome <?php echo $_SESSION['username'];?></h3><br/>
    <a href="addpet.php"><button type="button" class="btn btn-secondary">Add new pet</button></a><br/>
    <a href="users.php"><button type="button" class="btn btn-secondary" style="margin-top: 10px;">User added pets</button></a><br/>
    <div class="container-xxl py-5">
        <div class="row pb-5 mb-4">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <?php 
            $i = 1;
            require_once "database.php";
            $userId = $_SESSION['id'];
            $rows = mysqli_query($conn, "SELECT * FROM pets ORDER BY petCreateDate DESC");
            foreach($rows as $row) :
        ?>
        <!-- Card-->
        <div class="card shadow-sm border-0 rounded">
            <div class="card-body p-0"><img src="img/<?php echo $row["petPicture"]; ?>" alt="" class="w-100 h-80 card-img-top">
            <div class="p-4">
                <h5 class="mb-0"><?php echo $row["petName"]; ?></h5>
                <p class="small text-muted">Type: <?php echo $row["petType"]; ?></p>
            </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        </div>
        </div>
    </div>
    
</body>
</html>