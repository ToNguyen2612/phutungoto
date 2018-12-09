<?php
class DB
{
    private $_conn;

    function __construct()
    {
        $this->_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("không thể kết nối tới database");
        mysqli_query($this->_conn, "SET NAMES 'UTF8'");

    }

//    function selectBySQL($table)
//    {
//        $sql = "SELECT * FROM `$table`";
//        $query = mysqli_query($this->_conn, $sql);
//        return $query;
//    }

    function selectRoomID($table)
    {
        $sql = "SELECT id_room, name FROM `$table`";
        $query = mysqli_query($this->_conn, $sql);

        $response = [];
        while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $response[] = $data;
        }
        return $response;
    }

//    function selectAdmin($table,$conditions)
//    {
//        $array = array();
//        foreach ($conditions as $key => $value) {
//            array_push($array, "`$key` = '$value'");
//        }
//        $str = implode(" AND ", $array);
//        $sql = "SELECT * FROM $table WHERE $str";
//
//        $query = mysqli_query($this->_conn, $sql);
//
//        return $query;
//    }
//    function selectConditionAdmin()
//    {
//        $sql = "SELECT users.user_name, users.password, room.id_room, room.name,register.id_register,register.date,register.time_start, register.time_end FROM users,room,register WHERE users.id_user = register.id_user AND room.id_room = register.id_room GROUP BY register.id_register ";
//        $query = mysqli_query($this->_conn, $sql);
//        return $query;
//    }
    function selectCondition($column, $table, $condition)
    {
        $sql = "SELECT $column FROM $table WHERE $condition";
        $query = mysqli_query($this->_conn, $sql);

        return $query;
    }

    function selectConditionUser()
    {
        $sql = "SELECT  room.id_room, room.name, users.user_name, register.time_start, register.time_end FROM users,room,register WHERE users.id_user = register.id_user AND room.id_room = register.id_room";
        $query = mysqli_query($this->_conn, $sql);
        return $query;
    }

    function select($table, $conditions)
    {
        if (is_array($conditions)) {
            if ($conditions != null) {
                $array = array();
                foreach ($conditions as $key => $value) {
                    array_push($array, "`$key` = '$value'");
                }
                $str = implode(" AND ", $array);
                $sql = "SELECT * FROM $table WHERE $str";

                $query = mysqli_query($this->_conn, $sql);
                $row = mysqli_fetch_array($query);
                return $row;
            } else {
                $sql = "SELECT * FROM `$table`";
                $query = mysqli_query($this->_conn, $sql);
                $row = mysqli_fetch_array($query);
                return $row;
            }

        } else if (is_string($conditions)) {
            $sql = "SELECT * FROM `$table` where $conditions";
            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }
    }

    function insert($table, $record)
    {
        $con = array();
        if (!empty($record)) {
            foreach ($record as $key => $value) {
                array_push($con, array("$key", "$value"));
            }
        }

        $key = array();
        for ($i = 0; $i < count($record); $i++) {
            array_push($key, $con[$i][0]);
        }
        $value = array();
        for ($i = 0; $i < count($record); $i++) {
            array_push($value, $con[$i][1]);
        }
        $key = implode(",", $key);
        $value = implode("', '", $value);
        $str = "'";
        $str .= $value;
        $str .= "'";

        $sql = "INSERT INTO `$table`($key) VALUES($str)";
//        var_dump($sql);die;
        $query = mysqli_query($this->_conn, $sql);
        return $query;


    }

    function update($table, $record, $conditions)
    {
        if (is_array($conditions)) {
            if ($conditions != null) {
                if (!empty($record)) {
                    $con = array();
                    foreach ($conditions as $key => $value) {
                        foreach ($record as $key2 => $value2) {
                            array_push($con, "`$key2`='$value2'");
                        }
                        $con = implode(", ", $con);
                        $sql = "UPDATE `$table` SET $con WHERE `$key` = $value";
                        $query = mysqli_query($this->_conn, $sql);
                        return $query;
                    }
                }
            }

        }

        if (is_string($conditions)) {
            $con = array();
            foreach ($record as $key2 => $value2) {
                array_push($con, "`$key2`='$value2'");
            }
            $con = implode(",", $con);
            $sql = "UPDATE `$table` SET $con WHERE $conditions";;
            var_dump($sql);die;
            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }


    }

    function delete($table, $conditions)
    {
        if (is_array($conditions)) {
            if ($conditions != null) {
                foreach ($conditions as $key => $value) {
                    $sql = $sql = "DELETE FROM `$table` WHERE `$key`='$value'";
                    $query = mysqli_query($this->_conn, $sql);
                    return $query;
                }
            }

        }

        if (is_string($conditions)) {
            $sql = $sql = "DELETE FROM `$table` WHERE $conditions";
            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }
    }


    function getData($sql)
    {

        $resultSet = mysqli_query($this->_conn, $sql);

        $result = [];
        while (true) {
            $row = mysqli_fetch_assoc($resultSet);

            if ($row == null) {
                break;
            }
            $result[] = $row;
        }

        return $result;
    }
}