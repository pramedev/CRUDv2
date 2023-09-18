<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'crud');


    class DB_CON {
        public $dbcon;

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
        }

        public function login($username, $password){
            $data = mysqli_query($this->dbcon, "SELECT userID, username, role FROM usersTBL WHERE username = '$username' AND password = '$password'");
            $result = mysqli_fetch_array($data);
            $fetchData = mysqli_num_rows($data);
            
            if($fetchData>0){
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $result['role'];

                echo "<script>alert('Log In Success');</script>";
                header('Location: index.php');
            }
            else {
                $checkApprove = mysqli_query($this->dbcon, "SELECT username FROM ApproveTBL WHERE username = '$username'");
                $checkResult = mysqli_fetch_row($checkApprove);
                $checkRow = mysqli_num_rows($checkApprove);
                if($checkRow>0){
                    echo "<script>alert('Please wait Admin to approve your account');</script>";
                    echo "<script>window.location.href='login.php'</script>";
                }
                else {
                    echo "<script>alert('Invalid Username or Password, Please Register').$username .$password;</script>";
                    echo "<script>window.location.href='login.php'</script>";
                    exit();
                }
            }

        }

        public function register($username, $email, $password, $phonenumber, $fname, $lname){
            $query = mysqli_query($this->dbcon, "INSERT INTO approveTBL (`username`, `email`, `password`, `phonenumber`, `fname`, `lname`) VALUES ('$username', '$email', '$password', '$phonenumber', '$fname', '$lname')");
            echo "<script>alert('Register Successful, Please Wait Admin To Approve Your Account');</script>";
        }

        public function insert($username, $email, $password, $phonenumber, $fname, $lname, $role) {
            $result = mysqli_query($this->dbcon,"INSERT INTO usersTBL(username, email, password, phonenumber, fname, lname, role) VALUES('$username', '$email', '$password', '$phonenumber', '$fname', '$lname', '$role')");
        }

        public function delete($userID) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM usersTBL WHERE userID = '$userID'");
            return $deleterecord;
        }

        public function deny($username) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM ApproveTBL WHERE username = '$username'");
            return $deleterecord;
        }

        public function update($userID, $username, $email, $password, $phonenumber, $fname, $lname, $role) {
            $query = mysqli_query($this->dbcon, "UPDATE usersTBL SET
                    username = '$username',
                    email = '$email',
                    password = '$password',
                    phonenumber = '$phonenumber',
                    fname = '$fname',
                    lname = '$lname',
                    role = '$role'
                WHERE userID = '$userID'

            ");
            
            return $query;
        }

        public function fetchdata() {
            $data = mysqli_query($this->dbcon, "SELECT * FROM usersTBL");
            $row = mysqli_num_rows($data);
            $fetcheddata = mysqli_fetch_assoc($data);

            return $fetcheddata;
            return $row;
        }

        public function fetchOneRecord($id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM usersTBL WHERE userID = '$id'");
            return $result;
        }

        public function fetchApprove() {
            $data = mysqli_query($this->dbcon, "SELECT * FROM approveTBL");

            return $data;
        }

        public function fetchrole() {
            $data = mysqli_query($this->dbcon, "SELECT role FROM usersTBL ");
        }

        public function allow($username) {
            $data = mysqli_query($this->dbcon, "INSERT INTO usersTBL(`username`, `email`, `password`, `phonenumber`, `fname`, `lname`, `role`, `timestamp`) 
            SELECT `username`, `email`, `password`, `phonenumber`, `fname`, `lname`, `role`, `timestamp` 
            FROM approveTBL 
            WHERE `username` = '$username';");

            mysqli_query($this->dbcon,"DELETE FROM approveTBL
            WHERE username = '$username';");
            
            return $data;
        }
    }

    if(isset($_SESSION['username'])) {
        header('location: index.php');
    }
?>