<?php
require_once "../private/config.php";
$result = subjectManager::getSubject($_GET['subjectId']);
$courses = courseManager::getCourses();
if($_POST) {
    $name = $_POST['name'];
    $desc = $_POST['dec'];
    $course = $_POST['course'];
    subjectManager::updateSubject($name, $desc, $course, $_GET['subjectId']);
    header("Location: subject.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Subject</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Edit Subject</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $result->subName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" name="dec" class="form-control" id="dec" value="<?php echo $result->description; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Code</label>
                        <select name="course" class="form-control" id="course">
                            <?php
                                foreach($courses as $c) {
                                    if($c->name == $result->courseName) {
                                        echo "<option value='$result->course_id' selected >$result->courseName</option>";
                                    } else {
                                        echo "<option value='$c->id'>$c->name</option>";
                                    }
                                }
                            ?>
                        </select>                          
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="subject.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>