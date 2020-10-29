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
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset class="fieldset">
    <legend>Form</legend>
     <label>NAME:　　<input type="text" name="name" autocomplete="off"></label><br>
     <label>ID:　　　　<input type="text" name="lid" autocomplete="off"></label><br>
     <label>PASS:　　<input type="text" name="lpw" autocomplete="off"></label><br>

     <input type="hidden" name="kanri_flg" value="0">
     <label>管理者：<input type="checkbox" name="kanri_flg" value="1"></label><br>

     <input type="hidden" name="life_flg" value="1">
<!-- 

     <label>MANAGER：<input type="checkbox" name="kanri_flg" value="1"></label><br> -->
     <!-- <label>MANAGER<input name="check" type="hidden" value="0" /><input name="check" type="checkbox" value="1" /></label><br> -->
                        

     <input class="button" type="submit" value="entry">
   
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<a href="user_ichiran.php" class="btn btn-border">USER LIST </a>
