<?php
    class DataBase{        
        public static function connection(){
            $hostname = "localhost";
            $port = "3307";
            $database = "DB_SIREE";
            $username = "root";
            $password = "";
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	}
?>