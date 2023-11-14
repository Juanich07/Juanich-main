<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_errno();
}


// class Database {
//     private $host = DB_HOST;
//     private $username = DB_USER;
//     private $password = DB_PASS;
//     private $database = DB_NAME;
//     private $conn;

//     public function __construct() {
//         try {
//             $dsn = "mysql:host={$this->host};dbname={$this->database}";
//             $this->conn = new PDO($dsn, $this->username, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             die("Connection failed: " . $e->getMessage());
//         }
//     }


//     public function getConnection() {
//         echo 'Connected';
//         return $this->conn;
//     }
// }


?>