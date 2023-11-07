<?php
require_once "../private/config.php";
class courseManager
{
    public static function getCourses()
    {
        global $con;
        $s = $con->prepare("select * from course;");
        $s->execute();
        $results = $s->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public static function addCourse($name, $duration)
    {
        global $con;
        try {
            $s = $con->prepare("insert into course (name, duration_years) values (?, ?);");
            $s->bindValue(1, htmlspecialchars($name));
            $s->bindValue(2, htmlspecialchars($duration));
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public static function getCourse($id) {
        global $con;
        $s = $con->prepare("select * from course where id = ?;");
        $s->bindValue(1, $id);
        $s->execute();
        $results = $s->fetchObject();
        return $results;
    }
    public static function updateCourse($name, $duration, $id) {
        global $con;
        $s = $con->prepare("update course set name = ?, duration_years = ? where id = ?");
        $s->bindValue(1, htmlspecialchars($name));
        $s->bindValue(2, htmlspecialchars($duration));
        $s->bindValue(3, $id);
        $s->execute();
    }
    public static function deleteCourse($id){
        global $con;
        $s = $con->prepare("delete from course where id = ?");
        $s->bindValue(1, $id);
        $s->execute();
    }
}
