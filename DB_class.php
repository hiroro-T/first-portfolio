<?php


class DB_class{
    var $db_object;

    function DB_class(){
       // MySQL に接続し、データベースを選択します。  
       $conn = mysqli_connect("localhost:8889", "root", "root", "question_system_db") or die(mysql_error());  
       //echo mysqli_get_host_info($conn);
       mysqli_set_charset($conn, "utf8");
       //$query = "SET NAMES utf8"; // これを書くべし
       //mysql_query($query, $conn); // そして実行するべし

       $this->db_object = $conn;
	   
    }
}

?>
