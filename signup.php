<?php
require_once 'env.php';
$db_link = mysqli_connect($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWARD'], $_SERVER['DB_NAME']);
if (!$db_link) {
	die('データベースの接続に失敗しました。');
}

try {
	mysqli_select_db($db_link, $_SERVER['DB_NAME']);
	$username = $_POST['username'];
	$passward = md5($_POST['passward']);
	$data = mysqli_query($db_link, "SELECT * FROM users WHERE username='$username' AND passward='$passward'");
	mysqli_close($db_link);
} catch (Exception $e) {
	die($e);
}

if ($data->num_rows) {
	$user_data = $data->fetch_assoc();
	setcookie("userId", (int)$user_data["id"], time()+60*60*24);
	setcookie("start", (int)$user_data["start"], time()+60*60*24);
	setcookie("end", (int)$user_data["end"], time()+60*60*24);
	header("Location: ./start.php");
	exit;
} else {
	header("Location: ./index.php");
	exit;
}
?>