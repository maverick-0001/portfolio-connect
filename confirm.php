<?php
session_start();

// 入力画面からのアクセスでなければ戻す
if (!isset($_SESSION['form'])) {
  header('Location: index.php');
  exit();
} else {
  $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // メールを送信する
  $to = '';
  $from = $post['email'];
  $subject = 'お問い合わせが届きました';
  $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;
  // 送信内容
  // var_dump($body);
  // exit();
  // mb_send_mail($to, $subject, $body, "From: {$from}");

  // セッションを消してお礼画面へ
  unset($_SESSION['form']);
  header('Location: thanks.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header>
    <div class="header-logo">
      <a href="file:///Users/admin/Desktop/html_lesson/index.html#anchor"></a>
      <img src="images/connect.jpg" alt="ロゴ">
    </div>
    <nav>
      <ul class="nav-links">
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#connect-title">CONNECTについて</a></li>
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#staff-title">スタッフ</a></li>
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#time-price-title">営業時間と料金</a></li>
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#menu-title">メニュー</a></li>
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#foster_parent-title">里親について</a></li>
        <li><a href="file:///Users/admin/Desktop/html_lesson/index.html#access-title">アクセス</a></li>
        <li><a href="http://localhost:8888/index.php">お問い合わせ</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </header>
  <main>
    <section class="inquiry-section2">
      <h2 class="inquiry-title2" id="inquiry-title">お問い合わせ確認</h2>
      <form action="" method="POST">
        <div class="form-check">
          <p class="information">
            以下の内容でよろしければ「送信」をクリックして下さい。<br>
            内容を修正する場合は「戻る」をクリックして入力画面にお戻り下さい。<br>
          </p>
          <div class="form-group">
            <div class="form-item2">
              <label for="inputName">お名前</label>
            </div>
            <div class="confirm-item">
              <p class="display_item"><?php echo htmlspecialchars($post['name']); ?></p>
            </div>
          </div>
          <div class="form-group">
            <div class="form-item2">
              <label for="inputEmail">メールアドレス</label>
            </div>
            <div class="confirm-item">
              <p class="display_item"><?php echo htmlspecialchars($post['email']); ?></p>
            </div>
          </div>
          <div class="form-group">
            <div class="form-item2">
              <label for="inputContent">お問い合わせ内容</label>
            </div>
            <div class="confirm-item">
              <p class="display_item"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
              <!-- nl2brは改行する -->
            </div>
          </div>
          <div class="btn">
            <input type="submit" class="Form-Btn2" value="送信">
            <input type="reset" class="return-btn" value="戻る" onclick="history.back(-1)">
          </div>
        </div>
      </form>
    </section>
  </main>
  <footer>
    <div class="footer">
      © 2022 Cat Cafe CONNECT
    </div>
  </footer>
</body>
</html>