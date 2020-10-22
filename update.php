<?php
//①POSTでid,bookname,URL,commentを取得

$bookname= $_POST['bookname'];
$URL= $_POST['URL'];
$text= $_POST['comment'];
$id= $_POST['id'];




  //②DB接続
    try {
    //ID MAMP ='root'
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=bookmark;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //③UPDATE gs_bm_table SET

  $sql=$stmt=$pdo->prepare("UPDATE gs_bm_table SET bookname=:bookname,URL=:URL,comment=:comment WHERE id=:id");

  $stmt->bindValue(':bookname',$bookname,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':URL',$URL,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':comment',$text,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);//Integer（数値の場合 PDO::PARAM_INT)
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