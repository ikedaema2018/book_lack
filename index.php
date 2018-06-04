

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/style.css">
<title>おすすめCD登録画面</title>
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
        <div class="panel-heading page-title">CD登録画面<a href="cd_list.php" class="back-cd-list" href="cd_list.php">リストに戻る</a></div>
        <div class="panel-body">
          <form method="post" action="upload.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">曲名</label>
              <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
              <label class="control-label">アーティスト</label>
              <input class="form-control" type="text" name="artist">
            </div>
            <div class="form-group">
              <label class="control-label">CDパッケージ画像</label>
              <input type="file" name="upload_image">
            </div>
            <div class="form-group">
              <label class="control-label">一言コメント</label>
              <input class="form-control" type="text" name="comment">
            </div>
            <button class="btn btn-default">送信</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>