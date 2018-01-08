<?php
session_start();  //sesssionを使う時絶対必要
//ポスト送信された時
//$_POSTという変数が存在しているかつ
//empty...中身が空か判定する
if (isset($_POST) && !empty($_POST)){
  //入力チェック

 //ニックネーム
  if($_POST["nick_name"]==''){
  $error['nick_name']='blank';
 }
 //email

 if($_POST["email"]==''){
  $error['email']='blank';
 }
 //password
 //stlen 文字長さを数字で返してくれる関数
  
if($_POST["password"]==''){
  $error['password']='blank';
}elseif (strlen($_POST["password"]) < 4) {
  $error["password"] = 'length';
}
//入力チェック後、エラーがなければcheck.phpに移動
//$errorが存在してなかったら場合入力が正常
if (!isset($error)){
  //SESION変数に入力された値を入力された値を保存(どこの画面からも利用できる)
  //注意！必ずファイルの一番上にsession_start()
  //post送信されたjoinというキーで保存
  $_SESSION['join'] = $_POST;

  //CHECK.PHPに移動
 header('Location: check.php');

  //これ以下のコードを無駄に処理しないようにこのページの処理を終了させる。  
exit();

}
  
 }

  ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeedSNS</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/form.css" rel="stylesheet">
    <link href="../assets/css/timeline.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <!--
      designフォルダ内では2つパスの位置を戻ってからcssにアクセスしていることに注意！
     -->

  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><span class="strong-title"><i class="fa fa-twitter-square"></i> Seed SNS</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 content-margin-top">
        <legend>会員登録</legend>
        <form method="post" action="" class="form-horizontal" role="form">
          <!-- ニックネーム -->
          <div class="form-group">
            <label class="col-sm-4 control-label">ニックネーム</label>
            <div class="col-sm-8">
              <input type="text" name="nick_name" class="form-control" placeholder="例： Seed kun">
              <?php if((isset($error["nick_name"])) && ($error['nick_name']=='blank')){?>
              <p class="error">＊ ニックネームを入力してください。</p>
              <?php }?>
            </div>
          </div>
          <!-- メールアドレス -->
          <div class="form-group">
            <label class="col-sm-4 control-label">メールアドレス</label>
            <div class="col-sm-8">
              <input type="email" name="email" class="form-control" placeholder="例： seed@nex.com">
              <?php if ((isset($error ["email"])) && ($error['email']=='blank'))
              
             { ?>
              <p class="error">*メールアドレスを入力してください。</p>
              <?php } ?>
            </div>
          </div>
          <!-- パスワード -->
          <div class="form-group">
            <label class="col-sm-4 control-label">パスワード</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" placeholder="">
              <?php if ((isset($error ["password"])) && ($error['password']=='blank'))
              {  ?>
              <p class="error">＊パスワードを入力してください。</p>
              <?php } ?>

              <?php if ((isset($error ["password"])) && ($error['password']=='length'))
              {  ?>
              <p class="error">＊パスワードは４文字以上入力してください。</p>
              <?php } ?>
            </div>
          </div>
          <!-- プロフィール写真 -->
          <div class="form-group">
            <label class="col-sm-4 control-label">プロフィール写真</label>
            <div class="col-sm-8">
              <input type="file" name="picture_path" class="form-control">
            </div>
          </div>

          <input type="submit" class="btn btn-default" value="確認画面へ">
        </form>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../ass?ets/js/jquery-3.1.1.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
  </body>
</html>
