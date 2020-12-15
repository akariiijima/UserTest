<?php
$time = microtime(true) - (float)$_POST["time_start"];
require_once 'env.php';
$db_link = mysqli_connect($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWARD'], $_SERVER['DB_NAME']);
if (!$db_link) {
	die('データベースの接続に失敗しました。');
}

try {
	mysqli_select_db($db_link, $_SERVER['DB_NAME']);
	$user_id = $_POST['user_id'];
	$image = "images/1481_TW421J046-Q11@8.jpg";
	$image_num = (int)mb_substr($image, 7, 4);
	$source = range(1001, 1500);
	$filter = [123,124,456,234,412];
	$result = array_diff($source, $filter);
	shuffle($result);
	$test = $result[0];
	$image_num = str_pad($test, 4, 0, STR_PAD_LEFT);
	var_dump($test, true);
	var_dump($image_num, true);

	
} catch (Exception $e) {
	die($e);
} 


?>