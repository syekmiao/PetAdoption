<?php require "header.php"; ?>
<body>
    <div class="container">
        <h1>Application</h1><br/>
        <?php
            require "controller/applicationControl.php";
        ?>
        <form action="adoptApplication.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-lable">Full name: </label>
                <input type="text" placeholder="Enter your name: " name="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Email: </label>
                <input type="text" placeholder="Enter your contact email: " name="contactEmail" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Contact: </label>
                <input type="text" placeholder="Enter your phone number: " name="contactPhone" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Address: </label>
                <input type="text" placeholder="Enter your current living address: " name="address" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-lable">Do you own any pets?: </label>
                <select name="ownPets" class="form-select">
                    <option value="" disabled selected>Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Do you own or rent your home: </label>
                <select name="house" class="form-select">
                    <option value="" disabled selected>Select</option>
                    <option value="Own">Own</option>
                    <option value="Rent">Rent</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Do your family member/people living in the same house knows and agree you to adopt a pet? </label>
                <select name="othersAgreement" class="form-select">
                    <option value="" disabled selected>Select</option>
                    <option value="Haven't ask yet">Haven't ask yet</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-lable">Reason why you want to adopt the pet, and why should the current owner consider you to adopt the pet?</label>
                <textarea placeholder="You can write anything that you would like to say/clarify to the current owner." name="reason" rows="6" class="form-control"></textarea>
            </div>
            <div class="form-btn">
                <input type="submit" value="Apply" name="apply" class="btn btn-primary">
            </div>
    </form>
    </div>
    

</body>
</html>