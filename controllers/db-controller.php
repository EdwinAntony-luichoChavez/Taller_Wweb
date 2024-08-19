<?php
class DbController
{
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "biblioteca";
    protected $db;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->db = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if ($this->db->connect_errno) {
            echo ("Conexion fallida: " . $this->db->connect_error);
            exit;
        } else {
            echo ("Conexion exitosa");
        }
    }

    public function disconnect()
    {
        if ($this->db) {
            $this->db->close();
        }
    }
}
