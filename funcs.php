<?php
function dbConnect() {
  try {
    $pdo = new PDO('mysql:dbname=yanaginagi;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  } return $pdo;
}

function loginCheck() {
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!= session_id()) {
    echo "aiu";
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}



?>