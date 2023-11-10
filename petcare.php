<?php require "header.php";
?>
<body>
    <div class="container-xxl py-5">
        <div class="row pb-5 mb-4">
        <table class="table table-striped" style="max-width: 1180px;">
        
        <?php 
            $i = 1;
            require_once "database.php";

            if(empty($_GET["care"])){
                $rows = mysqli_query($conn, "SELECT * FROM information ORDER BY infoID ASC");
            }
            elseif($_GET["care"] == 1){
                $rows = mysqli_query($conn, "SELECT * FROM information WHERE infoType = 'dog' ORDER BY infoID ASC");
            }
            elseif($_GET["care"] == 2){
                $rows = mysqli_query($conn, "SELECT * FROM information WHERE infoType = 'cat' ORDER BY infoID ASC");
            }
            elseif($_GET["care"] == 3){
                $rows = mysqli_query($conn, "SELECT * FROM information WHERE infoType = 'other' ORDER BY infoID ASC");
            }
            else{
                $rows = mysqli_query($conn, "SELECT * FROM information ORDER BY infoID ASC");
            }
            $result = mysqli_fetch_array($rows, MYSQLI_ASSOC);
            if($result){
                foreach($rows as $row) :
        ?>
        <!-- Card-->
            <tr>
                <td><?php echo $row["infoTitle"]; ?></td>
                <td>Intended for: <b><?php echo $row["infoType"]; ?></b></td>
                <td>
                    <a href="infoDetails.php?infoID=<?php echo $row['infoID'];?>" class="btn btn-info">Read</a>
                </td>
            </tr>
            <?php $i++; endforeach; }
                else{
                    echo "<h3 style='margin: 20px; color:red;'>No data found</h3>";
                }

            ?>
        </table>
        </div>
    </div>
    
</body>
</html>