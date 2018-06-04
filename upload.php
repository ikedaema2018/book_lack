<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>naginagi-insert</title>
</head>
<body>
<p><?php

//ファイルに関する処理
if (is_uploaded_file($_FILES["upload_image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], "image/" . $_FILES["upload_image"]["name"])) {
    chmod("image/" . $_FILES["upload_image"]["name"], 0644);
    echo $_FILES["upload_image"]["name"] . "をアップロードしました。";
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}


//ポストされた値を代入
$title = $_POST["title"];
$artist = $_POST["artist"];
$image = $_FILES["upload_image"]["name"];
$comment = $_POST["comment"];

include("funcs.php");
$pdo = dbConnect();

$sql = "INSERT INTO yanaginagi_cd(id, title, artist, image, comment)VALUES(NULL, :title, :artist, :image, :comment)";
$stmt = $pdo->prepare($sql);


$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: cd_list.php");
}


?></p>
</body>
</html>