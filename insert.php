<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname= $_POST['bookname'];
$URL= $_POST['URL'];
$text= $_POST['text'];



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
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,bookname,URL,comment,day)VALUES(NULL,:name,:URL,:comment,sysdate())");
$stmt->bindValue(':name',$bookname,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL',$URL,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$text,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{

  //５．index.phpへリダイレクト
  header('Location: index.php');

}
?>
