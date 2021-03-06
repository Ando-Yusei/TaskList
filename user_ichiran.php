<!-- SELECTE -->

<?php
//1.  DB接続します
try {
  //ID MAMP ='root'
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .="<p>";
    $view .= '<a href="user_view.php?id='.$result["id"].'">';
    $view .= $result['name'].' '.$result['lid'].' '. $result['lpw'].' '.$result['kanri_flg'].' '.$result['life_flg'];
    $view .='</a>';
        $view .=' ';
        $view .= '<a href="user_delete.php?id='.$result["id"].'">';
        $view .='[Delete]';
        $view .='</a>';
        $view .= "</p>";
        
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Task List</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/style.css"  rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>


</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>User List</h2>
<table>
  <tr>
    <th><?= $view ?></th>
    
  </tr>

</table>

<!-- Main[End] -->
<a class="btn btn-border" href="user_touroku.php">To add</a>
</body>
</html>
