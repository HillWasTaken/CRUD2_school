<?php
require_once "../private/config.php";
$id = 2;
if($_POST) {
    $name = $_POST['courseName'];
    $duration = $_POST['duration'];
    $error = courseManager::addCourse($name, $duration);
    if($error) {
        echo "<script>alert('Course already exists.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Course Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Course Management</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Add Course</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" required name="courseName" class="form-control" id="course_name" placeholder="Enter course name">
                        <label for="course_duration">Course Duration</label>
                        <input type="number" required name="duration" class="form-control" id="course_name" placeholder="1">
                    </div>
                    <input type="submit" value="Add" class="btn btn-primary">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Course List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Duration</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $results = courseManager::getCourses();
                        foreach($results as $r) {
                            echo "<tr>";
                            echo "<td>$r->name</td>";
                            echo "<td>$r->duration_years</td>";
                            echo "<td><a href='edit.php?courseId=$r->id&id=$id' class='btn btn-success btn-sm'>Edit</a></td>";
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
