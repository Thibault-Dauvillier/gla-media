

<?php

//testing connection with user abonne
class Connection{

    private $servername = 'localhost';
    private $db = 'gla_database';

    private $username;
    private $password;

    public $conn;


    function initConnectionAbonne(){
        $this->username = 'abonne';
        $this->password = 'abonne';

        $this->conn= new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function initConnectionEmploye(){
        $this->username = 'employe';
        $this->password = 'employe';

        $this->conn= new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function closeConnection(){
        $this->conn->close();
    }







}




    ?>
