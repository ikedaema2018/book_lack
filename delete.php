<?php
$id = $_GET{"id"};

// session_start();
include("funcs.php");
$pdo = dbConnect();
// loginCheck();

$sql = 'DELETE FROM yanaginagi_cd WHERE id= :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  header("Location: cd_list.php");
  exit;
}
?>