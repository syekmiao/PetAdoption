<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add new pet</h1>
        <form action="addpet.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter pet name: " name="petname" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter type of pet: " name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="Add" class="btn btn-primary">
            </div>
            <br/><span id="linkToLoginPage" class="form-text">
                Didn't have an account? Click <a href="register.php">HERE</a> to register.
            </span>
    </form>
    </div>
    

</body>
</html>