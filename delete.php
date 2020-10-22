<?php
//①GETでid値を取得
$id = $_GET["id"];

//②DB接続
    try {
    //ID MAMP ='root'
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //③UPDATE gs_bm_table SET

  $sql=$stmt=$pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);
  $status = $stmt->execute();

 //④データ登録処理後
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
  }else{



  
  //⑤．select.phpへリダイレクト
    header('Location: select.php');
    exit;
  
  }
















?>