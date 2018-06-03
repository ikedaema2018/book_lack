<?php
$id = $_POST["id"];
$comment = $_POST["comment"];



// session_start();
include("funcs.php");
// loginCheck();
$pdo = dbConnect();

$sql = 'UPDATE yanaginagi_cd SET comment=:comment WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',  $id,  PDO::PARAM_STR);
$stmt->bindValue(':comment',  $comment,  PDO::PARAM_INT);    
$status = $stmt->execute();

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: cd_list.php");
  exit;
}
?>