<?php
require_once 'env.php';
$db_link = mysqli_connect($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWARD'], $_SERVER['DB_NAME']);
if (!$db_link) {
	die('データベースの接続に失敗しました。');
}

$passward = $_POST['passward'];
$re_passward = $_POST['re_passward'];
$username = $_POST['username'];
$data = mysqli_query($db_link, "SELECT * FROM users WHERE username='$username'");
if ($passward != $re_passward || $data->num_rows) {
	header( "Location: ./index.php" ) ;
	exit ;
}

try {
	mysqli_select_db($db_link, $_SERVER['DB_NAME']);
	$passward = md5($passward);
	$mail = $_POST['mail'];
	$age = (int)$_POST['age'];
	$sex = $_POST['sex'];
	$country = $_POST['country'];
	mysqli_query($db_link, "INSERT INTO users (username, passward, mail, age, sex, country) VALUES ('$username', '$passward', '$mail', '$age', '$sex', '$country')");
	$data = mysqli_query($db_link, "SELECT * FROM users WHERE username='$username' AND passward='$passward'");
	mysqli_close($db_link);
} catch (Exception $e) {
	die($e);
}

if ($data->num_rows) {
	setcookie("userId", (int)$data->fetch_all()[0][0], time()+60*60*24);
	header( "Location: ./start.php" ) ;
	exit;
} else {
	header( "Location: ./index.php" ) ;
	exit;
}
?>