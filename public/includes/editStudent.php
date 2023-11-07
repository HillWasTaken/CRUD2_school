<?php
require_once "../private/config.php";
$id = $_GET['studentId'];
$result = studentManager::getStudent($_GET['studentId']);
$results = countryManager::getCountries();
$courses = courseManager::getCourses();

if($_POST) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $mail = $_POST['email'];
    $a = $_POST['active'];
    if($a == 'on') {
        $active = true;
    } else {
        $active = false;
    }
    $country = $_POST['country_id'];
    $course = $_POST['course'];
    studentManager::updateStudent($fname, $lname, $mail, $active, $country, $course, $id);
    header("Location: student.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Edit Student</h1>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $result->firstname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $result->lastname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $result->email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="active">Active</label>
                        <?php
                            if($result->active == 1){
                                echo "<input type='checkbox' name='active' checked id='active'>";
                            } else {
                                echo "<input type='checkbox' name='active' id='active'>";
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Course ID</label>
                        <!-- <input type="text" name="course_id" class="form-control" id="course_id" value="<?php  ?>" required> -->
                        <select name="course" class="form-control">
                            <?php
                                foreach($courses as $r) {
                                    echo "<option value='$r->id'>$r->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country_id">Country ID</label>
                        <!-- <input type="text" name="country_id" class="form-control" id="country_id" value="<?php  ?>"> -->
                        <select name="country_id" class="form-control">
                            <?php
                                foreach($results as $r){
                                    echo "<option value='$r->id'>$r->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="student.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
