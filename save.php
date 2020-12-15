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
	$image = $_POST['image'];
	$image_num = (int)mb_substr($image, 7, 4);
	$attr_1 = (int)$_POST['attr_1'];
	$attr_2 = (int)$_POST['attr_2'];
	$attr_3 = (int)$_POST['attr_3'];
	$attr_4 = (int)$_POST['attr_4'];
	$attr_5 = (int)$_POST['attr_5'];
	mysqli_query($db_link, "INSERT INTO logs (user_id, image, image_num, attr_1, attr_2, attr_3, attr_4, attr_5, `time`) VALUES ('$user_id', '$image', '$image_num', '$attr_1', '$attr_2', '$attr_3', '$attr_4', '$attr_5', '$time')");
	mysqli_close($db_link);
} catch (Exception $e) {
	die($e);
} 


if ($_POST["state"] == "SAVE") {
	header( "Location: ./finish.php" ) ;
	exit;
}

if ($_POST["state"] == "NEXT") {
	header( "Location: ./answer.php" ) ;
	exit;
}

?>