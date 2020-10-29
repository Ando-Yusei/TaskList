<?php
//①POSTでid,bookname,URL,commentを取得

$name= $_POST['name'];
$lid= $_POST['lid'];
$lpw= $_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
$life_flg=$_POST['life_flg'];
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

  $sql=$stmt=$pdo->prepare("UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg,life_flg=:life_flg  WHERE id=:id");
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();

 //④データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
  }else{



  
  //⑤．select.phpへリダイレクト
    header('Location: user_ichiran.php');
    
  
  }




























?>