<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name= $_POST['name'];
$lid= $_POST['lid'];
$lpw= $_POST['lpw'];
$kanri_flg    = $_POST["kanri_flg"];
$life_flg    = $_POST["life_flg"];


// $check= $_POST['check'];
// echo($check);

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
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id,name,lid,lpw,kanri_flg,life_flg)VALUES(NULL,:name,:lid,:lpw,:kanri_flg,:life_flg)");
$stmt->bindValue(':name',$name,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',$lid,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',$lpw,PDO::PARAM_STR);//Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg',$kanri_flg,PDO::PARAM_INT);//Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',$life_flg,PDO::PARAM_INT);//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{

  //５．index.phpへリダイレクト
  header('Location: user_touroku.php');

}
?>
