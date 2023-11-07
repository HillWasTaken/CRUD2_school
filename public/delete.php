<?php
    require_once "../private/config.php";
    switch($_GET['id']) {
        case 1:
           //countryManager::deleteCountry($_GET['countryId']);
           header("Location: country.php");
           break;
        case 2:
            //courseManager::deleteCourse($_GET['courseId']);
            header("Location: course.php");
            break;
        case 3:
            studentManager::deleteStudent($_GET['studentId']);
            header("Location: student.php");
            break;
    }
?>