<?php
$id= $_GET["id"];



//2. DB接続します
try {
    //ID MAMP ='root'
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
  // これはおまじないなので意味を考えなくても良い

//３．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  
$status = $stmt->execute();

//4.データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
//idしか帰ってこないため下記の方法で。→1データのみの抽出時はwhile文で取り出さない
$row = $stmt->fetch();
}


?>





<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
 
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>USER　entry</h2>
<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset class="fieldset">
    <legend>Form</legend>
     <label>NAME:　　<input type="text" name="name" autocomplete="off" value="<?=$row["name"]?>"></label><br>
     <label>ID:　　　　<input type="text" name="lid" autocomplete="off" value="<?=$row["lid"]?>"></label><br>
     <label>PASS:　　<input type="text" name="lpw" autocomplete="off" value="<?=$row["lpw"]?>"></label><br>
     <label>MANAGER：<input type="text" name="kanri_flg" value="<?= $row['kanri_flg']?>"></label><br>
     <label>RETIREE：<input type="text" name="life_flg" value="<?= $row['life_flg']?>"></label>
     <input type="hidden" name="id" value="<?=$row["id"]?>">



     <!-- <label>MANAGER：<input type="checkbox" name="kanri_flg" value="1"></label><br>
     <input type="hidden" name="life_flg" value="1"> -->


     <!-- <label>MANAGER<input name="check" type="hidden" value="0" /><input name="check" type="checkbox" value="1" /></label><br> -->
                        

     <input class="button" type="submit" value="entry">
   
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a href="user_ichiran.php" class="btn btn-border">USER LIST </a>

</body>
</html>