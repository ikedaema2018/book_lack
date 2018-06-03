<?php
// session_start();
$id = $_GET["id"];
echo $id;
include("funcs.php");
$pdo = dbConnect();
// loginCheck();

$stmt = $pdo->prepare('SELECT * FROM yanaginagi_cd WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
if($status = false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
} else {
$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.css">
<title>コメント更新画面</title>
</head>
<body>
	<!-- <form method="post" action="" enctype="multipart/form-data">		
		<input type="file" name="upload_file">
		<div>
			<input type="submit" name="btn_submit" value="送信">
		</div>
  </form> -->
  
  <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">コメント更新画面</div>
        <div class="panel-body">
          <form method="post" action="update.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">タイトル</label>
              <input class="form-control" type="text" name="title" readonly="readonly" value="<?=$result["title"]?>">
            </div>
            <div class="form-group">
              <label class="control-label">アーティスト</label>
              <input class="form-control" type="text" name="artist" readonly="readonly" value="<?=$result["artist"]?>">
            </div>
            <div class="form-group">
              <label class="control-label">CDパッケージ画像</label>
              <p><?=$result["image"]?></p>
            </div>
            <div class="form-group">
              <label class="control-label">おすすめ曲</label>
              <p><?=$result["sound"]?></p>
            </div>
            <div class="form-group">
              <label class="control-label">一言コメント</label>
              <input class="form-control" type="text" name="comment" value="<?=$result["comment"]?>">
              <input type="hidden" name="id" value="<?=$result["id"]?>">
            </div>
            <button class="btn btn-default">送信</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>