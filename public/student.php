<?php
$id=3;
require_once "../private/config.php";
if($_POST) {
    $fname = $_POST['name'];
    $lname = $_POST['lastname'];
    $mail = $_POST['email'];
    $active = false;
    if(isset($_POST['active'])) {
        $a = $_POST['active'];
        if($a == "on"){ $active = true; } else { $active = false; }
    }
    $country = $_POST['country'];
    $course = $_POST['course'];
    studentManager::addStudent($fname, $lname, $mail, $active, $country, $course);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Student List</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="text-left mb-3">
                    <form method="post">
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" required name="name" class="form-control" id="student_name" placeholder="Enter Student name">
                            <label for="student_Lname">Student Lastname</label>
                            <input type="text" required name="lastname" class="form-control" id="student_Lname" placeholder="Enter Student lastname">
                            <label for="student_email">Student Email</label>
                            <input type="text" required name="email" class="form-control" id="student_email" placeholder="Enter Student Email">
                            <label for="student_active">Student Active</label>
                            <input type="checkbox" name="active" class="form-control" id="student_active" placeholder="Enter Student Active">
                            <label for="student_country">Student Country</label>
                            <select name="country" class="form-control" id="student_country" placeholder="Enter Student Country">
                                <?php
                                    $results = countryManager::getCountries();
                                    foreach($results as $r) {
                                        echo "<option value='$r->id'>$r->name</option>";
                                    }
                                ?>
                            </select>
                            <label for="student_course">Student Course</label>
                            <select name="course" class="form-control" id="student_course" placeholder="Enter Student Country">
                                <?php
                                    $results = courseManager::getCourses();
                                    foreach($results as $r) {
                                        echo "<option value='$r->id'>$r->name</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add Student">
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </form>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Active</th>
                            <th>Course ID</th>
                            <th>Country ID</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $results = studentManager::getStudents();
                            //var_dump($results);
                            foreach($results as $r) {
                                echo "<tr>";
                                echo "<td>$r->firstname</td>";
                                echo "<td>$r->lastname</td>";
                                echo "<td>$r->email</td>";
                                echo "<td>$r->active</td>";
                                echo "<td>$r->country_id</td>";
                                echo "<td>$r->course_id</td>";
                                echo "<td><a href='edit.php?studentId=$r->id&id=$id' class='btn btn-success btn-sm'>Edit</a></td>";
                                echo "<td><a href='delete.php?studentId=$r->id&id=$id' class='btn btn-danger btn-sm'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>