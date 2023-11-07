<?php
$id=4;
require_once "../private/config.php";
if($_POST) {
    $student = $_POST['student_name'];
    var_dump($student);
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $date = date('y-m-d h:i:s');
    gradeManager::addGrades($student, $subject, $grade, $date);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grades List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Grades List</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="text-left mb-3">
                    <form method="post">
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <select name="student_name" class="form-control" id="student">
                            <?php
                                $results = studentManager::getStudents();
                                var_dump($results);
                                foreach($results as $s) {
                                    echo "<option value='$s->id'>$s->firstname $s->lastname</option>";
                                }
                            ?>
                            </select>
                            <label for="subject">Subject</label>
                            <select name="subject" class="form-control" id="subject">
                            <?php
                                $result = subjectManager::getSubjects();
                                foreach($result as $r) {
                                    echo "<option value='$r->id'>$r->name</option>";
                                }
                            ?>
                            </select>
                            <label for="grade">Grade</label>
                            <input type="number" required name="grade" class="form-control" id="grade" placeholder="Enter Grade">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add Grade">
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </form>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Last Modified</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = gradeManager::getGrades();
                            //var_dump($result);
                            foreach($result as $a) {
                                echo "<tr>";
                                echo "<td>$a->firstname $a->lastname</td>";
                                echo "<td>$a->name</td>";
                                echo "<td>$a->grade</td>";
                                echo "<td>$a->last_modified</td>";
                                echo "<td><a href='edit.php?gradeId=$a->gradeId&id=$id' class='btn btn-success btn-sm'>Edit</a></td>";
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