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
	$end = (int)mysqli_query($db_link, "SELECT `end` FROM users ORDER BY id DESC LIMIT 1")->fetch_row()[0];
	$start = $end%1500+1;
	$end = $start + 499;
	$passward = md5($passward);
	$mail = $_POST['mail'];
	$age = (int)$_POST['age'];
	$sex = $_POST['sex'];
	$country = $_POST['country'];
	mysqli_query($db_link, "INSERT INTO users (username, passward, mail, age, sex, country, start, `end`) VALUES ('$username', '$passward', '$mail', '$age', '$sex', '$country', '$start', '$end')");
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
	header( "Location: ./start.php" ) ;
	exit;
} else {
	header( "Location: ./index.php" ) ;
	exit;
}
?>