<?php
    require_once "../private/config.php";
    class countryManager {
        public static function getCountries() {
            global $con;
            $s = $con->prepare("select * from country;");
            $s->execute();
            $result = $s->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        public static function getCountry($id) {
            global $con;
            $s = $con->prepare("select * from country where id = ?;");
            $s->bindValue(1, $id);
            $s->execute();
            $result = $s->fetchObject();
            return $result;
        }
        public static function updateCountry($name, $id) {
            global $con;
            $s = $con->prepare("update country set name = ? where id = ?");
            $s->bindValue(1, $name);
            $s->bindValue(2, $id);
            $s->execute();
        }
        public static function addCountry($name) {
            global $con;
            try {
                $s = $con->prepare("insert into country (name) values (?);");
                $s->bindValue(1, $name);
                $s->execute();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public static function deleteCountry($id) {
            global $con;
            $s = $con->prepare("delete from country where id = ?;");
            $s->bindValue(1, $id);
            $s->execute();
        }
    }
?>