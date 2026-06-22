<?php
// file: koneksi.php
//pbo
class Database {
    private $host = "localhost";
    private $db_name = "nama_database_anda"; // Sesuaikan dengan nama database Anda
    private $username = "root";              // Sesuaikan dengan username database Anda
    private $password = "";                  // Sesuaikan dengan password database Anda
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Mengatur error mode ke Exception dan fetch mode default sebagai objek
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>