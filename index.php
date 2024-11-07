<?php
$url = 'https://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {

        $people = [];
        foreach ($data as $record) {
            $people = array_merge($people, $record);
        }

        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Affiliation</th><th>Rank</th><th>Location</th></tr>';
        foreach ($people as $person) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($person['name']) . '</td>';
            echo '<td>' . htmlspecialchars($person['affiliation']) . '</td>';
            echo '<td>' . htmlspecialchars($person['rank']) . '</td>';
            echo '<td>' . htmlspecialchars($person['location']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'JSON error: ' . json_last_error_msg();
    }
}

curl_close($ch);
?>
