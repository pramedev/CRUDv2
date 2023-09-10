<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'crud');
    
    class DB_con {
        public $dbcon;
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($username, $email, $password, $role, $phonenumber, $address) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tblusers(username, email, password, role, phonenumber, address) VALUES('$username', '$email', '$password', '$role', '$phonenumber', '$address')");
            return $result;
        }

        public function fetchUserData() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchProduct() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblProducts");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function update($userid, $username, $email, $password, $role, $phonenumber,	$address) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                username = '$username',
                email = '$email',
                password = '$password',
                role = '$role',
                phonenumber = '$phonenumber',
                address = '$address'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function login($username, $password) {
            $loginquery = mysqli_query($this->dbcon, "SELECT id, username, role FROM tblusers WHERE username = '$username' AND password = '$password'");
            return $loginquery;
        }

        public function registration($username, $email, $password, $confpassword, $phonenumber) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail, password) VALUES('$username', '$email', '$password', '$confpassword','$phonenumber')");
            return $reg;
        }

        public function checkrole($username) {
            $sql = mysqli_query($this->dbcon,"SELECT role FROM tblusers WHERE '$username' = username");
            return $sql;
        }

        public function addtocart() {
            
        }

        public function showcart() {
            
        }
    }
?>