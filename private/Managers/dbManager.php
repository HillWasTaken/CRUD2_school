<?php
require_once "../private/config.php";
    class dbManager {
        public static function uploadUser($username, $password) {
            global $con;
            try {
                $newPass = password_hash($password, PASSWORD_DEFAULT);
                $s = $con->prepare("insert into user (login, password_hash) values(?,?);");
                $s->bindValue(1, htmlspecialchars($username));
                $s->bindValue(2, htmlspecialchars($newPass));
                $s->execute();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public static function getUser($username) {
            global $con;
            try {
                $s = $con->prepare("select * from user where login = ?;");
                $s->bindValue(1, $username);
                $s->execute();
                $result = $s->fetchObject();
                return $result;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>