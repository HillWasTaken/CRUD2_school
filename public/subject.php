<?php
require_once "../private/config.php";
$id = 5;
if($_POST) {
    $name = $_POST['Name'];
    $desc = $_POST['Description'];
    $course_id = $_POST['course'];
    subjectManager::addSubject($name, $desc, $course_id);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Subject Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">subject Management</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Add subject</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="Name">subject Name</label>
                        <input type="text" required name="Name" class="form-control" id="Name" placeholder="Enter course name">
                        <label for="Description">subject Description (Max 200 Characters)</label>
                        <input type="text" required name="Description" class="form-control" id="Description" placeholder="Subject Description">
                        <label for="course">Course</label>
                        <select name="course" class="form-control" id="course">
                            <?php
                                $result = courseManager::getCourses();
                                foreach($result as $r) {
                                    echo "<option value='$r->id'>$r->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Add" class="btn btn-primary">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Subject List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Subject Description</th>
                            <th>Course</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = subjectManager::getSubjects();
                            foreach($result as $r) {
                                echo "<tr>";
                                echo "<td>$r->name</td>";
                                echo "<td>$r->description</td>";
                                echo "<td>$r->course_id</td>";
                                echo "<td><a href='edit.php?subjectId=$r->id&id=$id' class='btn btn-success btn-sm'>Edit</a></td>";
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
