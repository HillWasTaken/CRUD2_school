<?php
require_once "../private/config.php";
if($_POST) {
    $username = $_POST['username'];
    global $username;
    $password = $_POST['password'];
    $password_repeat = $_POST['repeat_password'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['rep_pass'] = $password_repeat;
    if($password !== $password_repeat){
        echo "<script>alert('Password is not the same');</script>";
    } else {
        $error = dbManager::uploadUser($username, $password);
        if($error) {
            echo "<script>alert('Username is already taken.');</script>";
        } else {
            header("Location: login.php");
        }
    }
    //var_dump($username, $password, $password_repeat);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Register</h1>

                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <?php
                            if(isset($username)) {
                                echo "<input type='text' name='username' class='form-control' id='username' value='$username' placeholder='Enter your username'>";
                            }else {
                                echo '<input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="password">Repeat Password</label>
                        <input type="password" name="repeat_password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>