<?php
if (isset($_POST['name'])) {
    $time = date('d.m.Y H:i:s');

    $text = "Дата і час: $time\n";
    $text .= "Імʼя: " . $_POST['name'] . "\n";
    $text .= "Email: " . $_POST['email'] . "\n";
    $text .= "1. Як часто тренуєтесь: " . $_POST['q1'] . "\n";
    $text .= "2. Мета: " . $_POST['q2'] . "\n";
    $text .= "3. Побажання: " . $_POST['q3'] . "\n";

    if (!is_dir('survey')) mkdir('survey');
    file_put_contents('survey/' . date('Y-m-d_H-i-s') . '.txt', $text);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Опитування</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Iron Gym</h2>
    <ul class="menu">
        <li><a href="index.html">Головна</a></li>
            <li><a href="schedule.html">Графік</a></li>
            <li><a href="price.html">Ціни</a></li>
            <li><a href="animation.html">Анімація JS</a></li>
            <li><a href="game.html">Міні-гра JS</a></li>
            <li><a href="survey.php">Опитування</a></li>
    </ul>
    <hr>

    <div class="main">
        <h1>Опитування</h1>
    
        <?php if (isset($_POST['name'])): ?>
            <p>Дякуємо, <?= htmlspecialchars($_POST['name']) ?>!</p>
            <p>Дата і час заповнення: <b><?= $time ?></b></p>
        <?php else: ?>
            <form method="POST">
                <p>Імʼя: <input name="name" required></p>
                <p>Email: <input name="email" type="email" required></p>

                <p>1. Як часто ви тренуєтесь?</p>
                <input type="radio" name="q1" value="Рідко" required> Рідко<br>
                <input type="radio" name="q1" value="Часто"> Часто<br>

                <p>2. Яка ваша мета?</p>
                <select name="q2">
                    <option>Набір маси</option>
                    <option>Схуднення</option>
                </select>

                <p>3. Ваші побажання:</p>
                <textarea name="q3"></textarea>

                <p><button>Надіслати</button></p>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>