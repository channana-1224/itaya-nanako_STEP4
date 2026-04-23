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

            <label for="name">名前:</label>

            <input type="text" id="name" name="name">



            <label for="age">年齢:</label>

            <input type="number" id="age" name="age" min="0">



            <label for="phone">電話番号:</label>

            <input type="text" id="phone" name="phone">



            <label for="email">メールアドレス:</label>

            <input type="email" id="email" name="email">



            <label for="address">住所:</label>

            <input type="text" id="address" name="address">



            <label for="question">質問:</label>

            <input type="text" id="question" name="question">



            <label for="gender">性別:</label>

            <select id="gender" name="gender">

                <option value="男性">男性</option>

                <option value="女性">女性</option>

                <option value="その他">その他</option>

            </select>



            <button type="submit" class="submit-btn">送信</button>

        </form>

    </div>

</body>

</html>

