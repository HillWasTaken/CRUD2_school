<?php
require_once "../private/config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .text-center {
            margin-top: 20px;
        }
        .btn-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Welcome to the CRUD System</h1>

                <?php
                if (isset($_SESSION['loggedIn'])) {
                    echo '<p class="text-center">You are already logged in.</p>';
                    echo '<div class="btn-group d-flex justify-content-center">';
                    echo '<a class="btn btn-primary mr-2" href="country.php">Countries</a>';
                    echo '<a class="btn btn-primary mr-2" href="course.php">Courses</a>';
                    echo '<a class="btn btn-primary mr-2" href="student.php">Students</a>';
                    echo '<a class="btn btn-primary mr-2" href="grades.php">Grades</a>';
                    echo '<a class="btn btn-primary" href="subject.php">Subjects</a>';
                    echo '</div>';
                    echo '<a class="btn btn-primary mr-2" href="logout.php">Logout</a>';
                } else {
                    echo '<p class="text-center">Please log in to access the CRUD system.</p>';
                    echo '<div class="text-center"><a href="login.php" class="btn btn-primary">Login</a></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
