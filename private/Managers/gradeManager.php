<?php
    require_once "../private/config.php";
    class gradeManager {
        public static function addGrades($student, $subject, $grade, $date){
            global $con;
            $s = $con->prepare("insert into student_grades (student_id, subject_id, grade, last_modified) values (?,?,?,?);");
            $s->bindValue(1, $student);
            $s->bindValue(2, $subject);
            $s->bindValue(3, $grade);
            $s->bindValue(4, $date);
            $s->execute();
        }
        public static function getGrades() {
            global $con;
            $s = $con->prepare("SELECT student_grades.id AS gradeId, student_grades.student_id, student_grades.subject_id, student_grades.grade, student_grades.last_modified, student.id AS studentId, student.firstname, student.lastname, subject.id AS subjectId, subject.name, subject.description, subject.course_id FROM student_grades JOIN student ON student_grades.student_id = student.id JOIN subject ON student_grades.subject_id = subject.id");
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        public static function getGrade($id) {
            global $con;
            $s = $con->prepare("select * from student_grades join student on student_grades.student_id = student.id join subject on student_grades.subject_id = subject.id where student_grades.id = ?;");
            $s->bindValue(1, $id);
            $s->execute();
            $result = $s->fetchObject();
            return $result;
        }
        public static function updateGrades($student, $subject, $grade, $lastM, $id) {
            global $con;
            $s = $con->prepare("update student_grades set student_id = ?, subject_id = ?, grade = ?, last_modified = ? where id = ?;");
            $s->bindValue(1, $student);
            $s->bindValue(2, $subject);
            $s->bindValue(3, $grade);
            $s->bindValue(4, $lastM);
            $s->bindValue(5, $id);
            $s->execute();
        }
    }
