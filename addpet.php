<?php require "header.php"; ?>
<body>
    <div class="-xxl py-5">
        <h1>Add new pet</h1><br/>
        <?php
            require "controller/addControl.php";
        ?>
        <form action="addpet.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-lable">Pet name: </label>
                <input type="text" placeholder="Enter name of pet: " name="petname" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Type of pet: </label>
                <select class="form-select" name="type">
                    <option selected disabled>Select type of pets</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="other">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet picture: </label>
                <input type="file" name="piture" accept=".jpg, .jpeg, .png" class="form-control">
                <span id="fileHelpInline" class="form-text">
                    Only Accepting .jpg .jpeg and .png files
                </span>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet age: </label>
                <input type="text" placeholder="Enter age of pet: " name="petage" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Pet breed: </label>
                <input type="text" placeholder="Enter breed of pet: " name="breed" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Vaccination Status: </label>
                <select name="vaccinate" class="form-select">
                    <option value="Not Sure">Not sure</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Deworm Status: </label>
                <select name="deworm" class="form-select">
                    <option value="Not Sure">Not sure</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Spray Status: </label>
                <select name="spray" class="form-select">
                    <option value="Not Sure">Not sure</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Pet body size: </label>
                <input type="text" placeholder="Enter body size of pet: (large/medium/small/fur length)" name="size" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Pet color: </label>
                <input type="text" placeholder="Enter pet color:" name="color" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Additional information: gender, like and dislike, potty trained or not, etc...</label>
                <textarea placeholder="Enter any extra information:" name="information" rows="6" class="form-control"></textarea>
            </div>
            <div class="form-btn">
                <input type="submit" value="Add" name="add" class="btn btn-primary">
            </div>
    </form>
    </div>
    

</body>
</html>