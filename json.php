<?php
function parseSurveyFile($filename) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);  // Зчитуємо всі рядки файлу
    $surveyData = [];

    foreach ($lines as $line) {
        if (empty($line)) continue;
        
        // Розділяємо рядок по двокрапці для отримання імені параметра і значення
        list($key, $value) = explode(":", $line, 2);
        
        // Видаляємо зайві пробіли з обох сторін
        $key = trim($key);
        $value = trim($value);

        // Додаємо дані у масив
        $surveyData[$key] = $value;
    }

    return $surveyData;
}

$directory = 'survey/';
$files = scandir($directory);

$allSurveys = [];

foreach ($files as $file) {
    if (is_file($directory . $file)) {
        $survey = parseSurveyFile($directory . $file);
        $allSurveys[] = $survey;
    }
}

// Виведення даних у форматі JSON
header('Content-Type: application/json');
echo json_encode($allSurveys, JSON_PRETTY_PRINT);
?>
