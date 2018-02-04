<?php
session_start();

include('../common/functions.php');

chkssid();

$id = $_GET["id"];

//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
chkssid();
//1.  DB接続します
  $pdo=db_con();

  //２．データ登録SQL作成
  $stmt = $pdo->prepare("SELECT * FROM gs_book_table WHERE id=:id");
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);//第3引数は任意
  $status = $stmt->execute();
  
  //３．データ表示
  $view="";
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    error_db_info($stmt);
  }else{
    //アロー関数は関数の中のという意味
    $row = $stmt->fetch();
  }
  ?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<?php include("../common/auth_header.php"); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>タイトル：<input type="text" name="title" value=<?=$row["title"]?>></label><br>
     <label>URL：<input type="text" name="url" value=<?=$row["url"]?>></label><br>
     <label>メモ：<input type="text" name="memo" value=<?=$row["memo"]?>></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<?php include("../common/auth_fotter.php"); ?>

</body>
</html>
