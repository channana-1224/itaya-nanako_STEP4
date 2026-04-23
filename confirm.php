<!DOCTYPE html>

<html lang="ja">

<head>

    <meta charset="UTF-8">

    <title>入力内容確認</title>

</head>

<body>

    <h1>入力内容確認</h1>

    <?php

    $errors = [];

    $data = $_POST;


    if (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u', $data['name'])) $errors[] = "名前はひらがな、カタカナ、漢字、英字のみ使用できます。";

    if ($data['age'] < 0 || $data['age'] > 150) $errors[] = "年齢は0から150の間で入力してください。";

    if (!preg_match('/^[0-9-]+$/', $data['phone'])) $errors[] = "電話番号は半角数字とハイフンのみ使用できます。";

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "メールアドレスの形式が正しくありません。";

    if (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u', $data['address'])) $errors[] = "住所はひらがな、カタカナ、漢字、英字のみ使用できます。";



    if (!empty($errors)) {

        foreach ($errors as $error) echo "<p style='color:red;'>$error</p>";

        echo '<a href="form.php">戻る</a>';

    } else {

        echo "<p>名前: " . htmlspecialchars($data['name']) . "</p>";

        echo "<p>年齢: " . htmlspecialchars($data['age']) . "</p>";

        echo "<p>電話番号: " . htmlspecialchars($data['phone']) . "</p>";

        echo "<p>メールアドレス: " . htmlspecialchars($data['email']) . "</p>";

        echo "<p>住所: " . htmlspecialchars($data['address']) . "</p>";

        echo "<p>質問: " . htmlspecialchars($data['question']) . "</p>";

        echo "<p>性別: " . htmlspecialchars($data['gender']) . "</p>";

    }

    ?>

</body>

</html>

