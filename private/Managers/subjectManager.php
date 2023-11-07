<?php
    require_once "../private/config.php";
    class subjectManager {
        public static function addSubject($name, $desc, $course_id) {
            global $con;
            $s = $con->prepare("insert into subject (name, description, course_id) values (?,?,?);");
            $s->bindValue(1, $name);
            $s->bindValue(2, $desc);
            $s->bindValue(3, $course_id);
            $s->execute();
        }      
        public static function getSubjects() {
            global $con;
            $s = $con->prepare("select * from subject;");
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        public static function getSubject($id) {
            global $con;
            $s = $con->prepare("select subject.name as subName, subject.description, subject.course_id, course.name as courseName, course.duration_years from subject join course on subject.course_id = course.id where subject.id = ?;");
            $s->bindValue(1, $id);
            $s->execute();
            $result = $s->fetchObject();
            return $result;
        }
        public static function updateSubject($name, $desc, $course, $id) {
            global $con;
            $s = $con->prepare("update subject set name = ?, description = ?, course_id = ? where id = ?;");
            $s->bindValue(1, $name);
            $s->bindValue(2, $desc);
            $s->bindValue(3, $course);
            $s->bindValue(4, $id);
            $s->execute();
        }
    }
?>