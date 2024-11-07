<?php
$jsonData = file_get_contents('http://9db4d93.studcloud.inf.ua/Web-laba6-7/json.php');

// Перетворюємо JSON у масив
$surveys = json_decode($jsonData, true);

if (!$surveys) {
    echo "Не вдалося отримати дані.";
    exit;
}

echo "<table border='1'>";
echo "<tr><th>Ім'я</th><th>Email</th><th>Питання 1</th><th>Питання 2</th><th>Питання 3</th><th>Час заповнення</th></tr>";

foreach ($surveys as $survey) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($survey['Ім\'я']) . "</td>";
    echo "<td>" . htmlspecialchars($survey['Email']) . "</td>";
    echo "<td>" . htmlspecialchars($survey['Питання 1']) . "</td>";
    echo "<td>" . htmlspecialchars($survey['Питання 2']) . "</td>";
    echo "<td>" . htmlspecialchars($survey['Питання 3']) . "</td>";
    echo "<td>" . htmlspecialchars($survey['Час заповнення']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
