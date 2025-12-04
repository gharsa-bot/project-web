<?php
class User {
    private $db;
    public function __construct($mysqli) { $this->db = $mysqli; }

    public function login($username, $password) {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $res = $this->db->query($sql);
        if ($res && $res->num_rows) return $res->fetch_assoc();
        return false;
    }
}
