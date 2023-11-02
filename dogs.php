<?php require "header.php";
?>
<body>
    <div class="container-xxl py-5">
        <div class="row pb-5 mb-4">
        
        <?php 
            $i = 1;
            require_once "database.php";
            $rows = mysqli_query($conn, "SELECT * FROM pets WHERE petType = 'dog' AND petStatus = 'not' ORDER BY petCreateDate DESC");
            $result = mysqli_fetch_array($rows, MYSQLI_ASSOC);
            if($result){
            foreach($rows as $row) :
        ?>
        <!-- Card-->
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-body p-0"><img src="img/<?php echo $row["petPicture"]; ?>" alt="" class="card-img-top" 
                height="300" width="100" style="margin: 10px">
            <div class="p-4">
                <h5 class="mb-0"><?php echo $row["petName"]; ?></h5>
                <p class="small text-muted">Type: <?php echo $row["petType"]; ?></p>
                <a href="petDetails.php?petid=<?php echo $row['petID'];?>" class="btn btn-info">View More</a>
            </div>
            </div>
            
        </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; }
        else{
            echo "<h3 style='margin: 20px; color:red;'>No data found</h3>";
        }
        ?>
        </div>
    </div>
    
</body>
</html>