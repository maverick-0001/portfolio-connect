<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  // フォームの送信時にエラーをチェックする
  if ($post['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($post['email'] === '') {
    $error['email'] = 'blank';
  } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'email';
  }
  if ($post['contact'] === '') {
    $error['contact'] = 'blank';
}
  if (count($error) === 0) {
    // エラーが0だから確認画面に移動
    $_SESSION['form'] = $post;
    header('Location: confirm.php');
    exit();
  }
} else {
  if (isset($_SESSION['form'])) {
    $post = $_SESSION['form'];
  }
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
    <section class="inquiry-section">
      <h2 class="inquiry-title" id="inquiry-title">お問い合わせ</h2>
      <form action="" method="POST" novalidate>
        <div class="Form">
          <div class="Form-Item-name">
            <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>お名前</p>
            <input 
              type="text" 
              class="Form-Item-Input" 
              name="name" 
              value="<?php echo htmlspecialchars($_POST['name']); ?>" 
              placeholder="例）山田太郎"
              required
            >
          </div>
          <div class="error_message">
            <?php if ($error['name'] === 'blank'): ?>
              <p class="error_message">※お名前をご記入下さい</p>
            <?php endif; ?>
          </div>
          <div class="Form-Item-email">
            <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
            <input
              type="email" 
              class="Form-Item-Input" 
              name="email" 
              value="<?php echo htmlspecialchars($_POST['email']); ?>" 
              placeholder="例）connect@connect.com"
              required
            >
          </div>
          <div class="error_message">
            <?php if ($error['email'] === 'blank'): ?>
              <p class="error_message">※アドレスをご記入下さい</p>
            <?php endif; ?>
            <?php if ($error['email'] === 'email'): ?>
              <p class="error_message">※メールアドレスを正しくご記入ください</p>
            <?php endif; ?>
          </div>
          <div class="Form-Item-contact">
            <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
            <textarea class="Form-Item-Textarea" name="contact" required><?php echo htmlspecialchars($_POST['contact']); ?></textarea>
          </div>
          <div class="error_message">
            <?php if ($error['contact'] === 'blank'): ?>
              <p class="error_message">※お問い合わせ内容をご記入下さい</p>
            <?php endif; ?>
          </div>
          <input type="submit" class="Form-Btn" value="確認画面">
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