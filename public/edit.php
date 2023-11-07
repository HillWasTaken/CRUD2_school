<?php
    require_once "../private/config.php";
    switch($_GET['id']){
        case 1:
            require_once "../public/includes/editCountry.php";
            break;
        case 2:
            require_once "../public/includes/editCourse.php";
            break;
        case 3:
            require_once "../public/includes/editStudent.php";
            break;
        case 4:
            require_once "../public/includes/editGrades.php";
            break;
        case 5:
            require_once "../public/includes/editSubject.php";
            break;
    }
?>