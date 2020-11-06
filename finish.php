<head>
  <title>User Test</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
<?php
	$user_id = $_COOKIE["userId"];
	if (!$user_id) {
		header( "Location: ./index.php" );
		exit;
	}
	require_once 'env.php';
	$db_link = mysqli_connect($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWARD'], $_SERVER['DB_NAME']);
	if (!$db_link) {
		die('データベースの接続に失敗しました。');
	}

	$data = mysqli_query($db_link, "SELECT * FROM users WHERE id='$user_id'");
	$username = $data->fetch_assoc()["username"];
	$data = mysqli_query($db_link, "SELECT count(*) as count FROM logs WHERE user_id='$user_id'");
	$count = $data->fetch_assoc()["count"];
	$data = mysqli_query($db_link, "SELECT user_id, username, count(*) AS `count` FROM `logs`AS L LEFT OUTER JOIN users AS U ON U.id = L.user_id GROUP BY L.user_id ORDER BY `count` DESC LIMIT 10");
	$ranking = [];
	while ($row = $data->fetch_assoc()){
	    $ranking[] = [$row["username"], $row["count"]];
	}
?>
	<h1>ご回答ありがとうございました。</h1>
	<h4>
		<?php echo $username; ?>さんの総回答数は<?php echo $count; ?>です。
	</h4>
	総回答数ランキング<br>
	<table>
		<tbody>
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
			<?php for ($i = 1; $i <= count($ranking); $i++) { ?>
				<tr><td><?php echo $i; ?>位</td><td><?php echo $ranking[$i-1][0]; ?></td><td></td><td></td><td><?php echo $ranking[$i-1][1]; ?></td></tr>
			<?php } ?>
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
		</tbody>
	</table>
	
	<form action="index.php" method="post">
		<input type="submit" value="ログイン画面に戻る" class="btn-flat-border">
	</form>
	<h3>
		何か質問や問題がございましたらご連絡ください。<br><br>
		お茶の水女子大学人間文化創成科学研究科 理学専攻<br>
		博士課程前期1年 伊藤研 飯島緋理(いいじまあかり)<br>
		Itoh labo page : <a href='http://itolab.is.ocha.ac.jp/'>HERE</a><br>
		Email : <a href="mailto:g1620501@is.ocha.ac.jp">g1620501@is.ocha.ac.jp</a>
	</h3>
</body>