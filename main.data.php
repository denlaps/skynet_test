<?

$url = 'https://www.sknt.ru/job/frontend/data.json';
$json = file_get_contents($url);
$data = json_decode($json, true);

?>