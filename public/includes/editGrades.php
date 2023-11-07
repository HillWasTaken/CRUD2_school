<?php
require_once "../private/config.php";
$students = studentManager::getStudents();
$subjects = subjectManager::getSubjects();
$grade = gradeManager::getGrade($_GET['gradeId']);
if($_POST) {
    $student = $_POST['student_id'];
    $subject = $_POST['subject_id'];
    $grade = $_POST['grade'];
    $lastM = date('y-m-d h:i:s');
    $id = $_GET['gradeId'];
    gradeManager::updateGrades($student, $subject, $grade, $lastM, $id);
    header("Location: grades.php");
}
//var_dump($grade);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Grade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Update Grade</h1>

                <form method="POST">
                    <div class="form-group">
                        <label for="student">Student</label>
                        <select class="form-control" id="student" name="student_id">
                            <?php
                                foreach($students as $s) {
                                    if($s->firstname == $grade->firstname && $s->lastname == $grade->lastname) {
                                        echo "<option value='$grade->student_id' selected >$grade->firstname $grade->lastname</option>";
                                    } else {
                                        echo "<option value='$s->id'>$s->firstname $s->lastname</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select class="form-control" id="subject" name="subject_id">
                            <?php
                                foreach($subjects as $s) {
                                    if($s->name == $grade->name) {
                                        echo "<option value='$grade->subject_id' selected >$grade->name</option>";
                                    } else {
                                        echo "<option value='$s->id'>$s->name</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="number" class="form-control" id="grade" name="grade" step="any" value="<?php echo $grade->grade; ?>">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="grades.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
