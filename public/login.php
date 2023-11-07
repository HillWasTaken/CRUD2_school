<?php
require_once "../private/config.php";
//var_dump($_POST);
if($_POST) {
    $result = dbManager::getUser($_POST['username']);
    //var_dump($result);
    $password = $_POST['password'];
    if(password_verify($password, $result->password_hash)) {
        $_SESSION['loggedIn'] = true;
        header("Location: index.php");
    } else {
        echo "<script>alert('Password is incorrect.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Login</h1>

                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary">
                        or
                        <a href="register.php" type="button" class="btn btn-primary" id="registerButton">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            // Handle the click event on the "Register" button
            $("#registerButton").click(function() {
                // Make an AJAX request to load the register page
                $.ajax({
                    url: "register.php",
                    type: "GET",
                    success: function(response) {
                        // Replace the current page content with the register page content
                        $("body").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script> -->
</body>

</html>