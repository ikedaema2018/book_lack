<?php
include "funcs.php";
$pdo = dbConnect();

$stmt = $pdo->prepare("SELECT * FROM yanaginagi_cd");
$status = $stmt->execute();

$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '
    <div class=" col-sm-4">
      <div class="panel panel-default">
      <div class="panel-heading h-20">' . $result["title"] . '<a href="update_view.php?id='.$result["id"].'" class="glyphicon glyphicon-pencil pencil"></a><a href="delete.php?id='.$result["id"].'" class="glyphicon glyphicon-trash trash"></a></div>
      <div class="panel-body h-100">
        <img class="h250" src="./image/' . $result["image"] . '" alt="">
        <p class="artist">アーティスト：' . $result["artist"] . '</p>
        <p class="comment">' . $result["comment"] . '</p>
        <audio class="mp3" src="music/' . $result["sound"] . '" controls>
        </div>
        </div>
      </div>
  ';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
  <title>やなぎなぎCDラック</title>
</head>
<body>
    <nav class="navbar navbar-default navinavi">
    <a class="navbar-brand">やなぎなぎCDラック</a><a href="index.php" class="glyphicon glyphicon-plus plus"></a>

      <div class="container-fluid">
        <div class="navbar-header navinavi">
        <!-- <a class="navbar-brand" href="#">やなぎなぎCDラック</a><span class="glyphicon glyphicon-plus plus"></span> -->
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
      <?=$view?>
      </div>
    </div>
  </body>
</body>
</html>
