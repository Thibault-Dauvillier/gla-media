

<?php

//testing connection with user abonne
class Connection{

    private String $servername = 'localhost';
    private String $db = 'gla_database';

    private String $username;
    private String $password;

    public $conn;


    function initConnectionAbonne(){
        $this->username = 'alex';
        $this->password = 'liebe-99';

        $this->conn= new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function initConnectionEmploye(){
        $this->username = 'alex';
        $this->password = 'liebe-99';

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