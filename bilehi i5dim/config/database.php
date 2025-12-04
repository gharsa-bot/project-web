<?php
// config/database.php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "gestion_cabinet";

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    die("Erreur connexion DB: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
