<?php
    $id = $_GET['courseId'];
    $results = courseManager::getCourse($id);
    if($_POST) {
        $name = $_POST['course_name'];
        $duration = $_POST['duration'];
        courseManager::updateCourse($name, $duration, $id);
        header("Location: course.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit Course</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" name="course_name" class="form-control" id="course_name" value="<?php echo $results->name; ?>">
                        <label for="course_name">Course Name</label>
                        <input type="number" name="duration" class="form-control" id="course_duration" value="<?php echo $results->duration_years; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
