<?php
session_start();

// 1. データ復元と不正アクセスガード
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$_SESSION['form_data'] = $_POST;
$data = $_POST;
} else {
$data = $_SESSION['form_data'] ?? [];
}

// データが空なら入力画面へ強制送還（不正アクセス対策も盛り込み）
if (empty($data)) {
header('Location: form.php');
exit;
}

// 2. Null合体演算子(??)で安全に変数へ格納
$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';
$age = $data['age'] ?? '';
$gender = $data['gender'] ?? '';
$address = $data['address'] ?? '';
$question = $data['question'] ?? '';

$errors = [];

// 3. バリデーション（空欄チェック＋制約チェック）
if (empty($name)) $errors[] = '名前を入力してください。';
if (empty($email)) $errors[] = 'メールアドレスを入力してください。';
if (empty($phone)) $errors[] = '電話番号を入力してください。';
if (empty($age)) $errors[] = '年齢を入力してください。';
if (empty($gender)) $errors[] = '性別を入力してください。';
if (empty($question)) $errors[] = '質問を入力してください。';

if (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u', $name)) $errors[] = '名前の形式が正しくありません。';
if (!is_numeric($age) || $age < 0 || $age > 150) $errors[] = '年齢は0から150の数字で入力してください。';
if (!preg_match('/^[0-9-]+$/', $phone)) $errors[] = '電話番号の形式が正しくありません。';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'メールアドレスの形式が正しくありません。';
if (mb_strlen($question) > 200) $errors[] = '質問は200文字以内で入力してください。';
if (substr_count($question, "\n") >= 5) $errors[] = '質問は5行以内で入力してください。';

// エラーがある場合は入力画面へ戻す
if (!empty($errors)) {
foreach ($errors as $error) {
echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
}
echo '<a href="form.php">入力画面に戻る</a>';
exit;
}
?> <!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>入力内容確認</title>
</head>
<body>
<h1>入力内容確認</h1>
<p>名前：<?php echo htmlspecialchars($name); ?></p>
<p>メール：<?php echo htmlspecialchars($email); ?></p>
<p>電話番号：<?php echo htmlspecialchars($phone); ?></p>
<p>年齢：<?php echo htmlspecialchars($age); ?></p>
<p>性別：<?php echo htmlspecialchars($gender); ?></p>
<p>住所：<?php echo htmlspecialchars($address); ?></p>
<p>質問：<?php echo nl2br(htmlspecialchars($question)); ?></p>

<form action="complete.php" method="POST"> 
<input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
<input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
<input type="hidden" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
<input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
<input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
<input type="hidden" name="address" value="<?php echo htmlspecialchars($address); ?>">
<input type="hidden" name="question" value="<?php echo htmlspecialchars($question); ?>">

<input type="submit" value="送信">
</form>
</body>
</html>