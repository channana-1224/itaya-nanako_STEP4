<?php
session_start();
// セッションから前回のデータを取得（なければ空の配列を代入）
$data = $_SESSION['form_data'] ?? [];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>フォーム入力</title>
</head>
<body>
<h1>フォーム入力</h1>
<div class="form-container">
<form action="confirm.php" method="post">

<label for="name">名前：</label>
<input type="text" id="name" name="name"
value="<?php echo htmlspecialchars($data['name'] ?? ''); ?>">

<label for="age">年齢：</label>
<input type="number" id="age" name="age" min="0"
value="<?php echo htmlspecialchars($data['age'] ?? ''); ?>">

<label for="phone">電話番号：</label>
<input type="text" id="phone" name="phone"
value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>">

<label for="email">メールアドレス：</label>
<input type="email" id="email" name="email"
value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">

<label for="address">住所：</label>
<input type="text" id="address" name="address"
value="<?php echo htmlspecialchars($data['address'] ?? ''); ?>">

<label for="question">質問：</label>
<input type="text" id="question" name="question"
value="<?php echo htmlspecialchars($data['question'] ?? ''); ?>">

<label for="gender">性別：</label>
<select id="gender" name="gender">
<option value="男性" <?php if (($data['gender'] ?? '') === '男性') echo 'selected'; ?>>男性</option>
<option value="女性" <?php if (($data['gender'] ?? '') === '女性') echo 'selected'; ?>>女性</option>
<option value="その他" <?php if (($data['gender'] ?? '') === 'その他') echo 'selected'; ?>>その他</option>
</select>

<button type="submit" class="submit-btn">送信</button>
</form>
</div>
</body>
</html>
