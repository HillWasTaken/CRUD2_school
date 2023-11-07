<?php
    require_once "../private/config.php";
    class studentManager {
        public static function addStudent($name, $Lname, $email, $active, $country, $course) {
            global $con;
            $s = $con->prepare("insert into student (firstname, lastname, email, active, country_id, course_id) values (?,?,?,?,?,?);");
            $s->bindValue(1, htmlspecialchars($name));
            $s->bindValue(2, htmlspecialchars($Lname));
            $s->bindValue(3, htmlspecialchars($email));
            $s->bindValue(4, htmlspecialchars($active));
            $s->bindValue(5, htmlspecialchars($country));
            $s->bindValue(6, htmlspecialchars($course));
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        public static function getStudents() {
            global $con;
            $s = $con->prepare("select * from student");
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        public static function deleteStudent($id) {
            global $con;
            $s = $con->prepare("delete from student where id = ?");
            $s->bindValue(1, $id);
            $s->execute();
        }
        public static function getStudent($id) {
            global $con;
            $s = $con->prepare("select * from student join country on student.country_id = country.id join course on student.course_id = course.id where student.id = ?;");
            $s->bindValue(1, $id);
            $s->execute();
            $result = $s->fetchObject();
            return $result;
        }
        public static function updateStudent($firstname, $lastname, $email, $active, $country_id, $course_id, $id){
            global $con;
            $s = $con->prepare("update student set firstname = ?, lastname = ?, email = ?, active = ?, country_id = ?, course_id = ? where id = ?");
            $s->bindValue(1, $firstname);
            $s->bindValue(2, $lastname);
            $s->bindValue(3, $email);
            $s->bindValue(4, $active);
            $s->bindValue(5, $country_id);
            $s->bindValue(6, $course_id);
            $s->bindValue(7, $id);
            $s->execute();
        }
    }

?>