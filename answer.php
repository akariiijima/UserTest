<?php
	$user_id = $_COOKIE["userId"];
	$start = $_COOKIE["start"];
	$end = $_COOKIE["end"];
	if (!$user_id || !$start || !$end) {
		header( "Location: ./index.php" );
		exit;
	}

	require_once 'env.php';
	$db_link = mysqli_connect($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWARD'], $_SERVER['DB_NAME']);
	if (!$db_link) {
		die('データベースの接続に失敗しました。');
	}

	$data = mysqli_query($db_link, "SELECT image_num FROM logs WHERE user_id='$user_id'");
	$image_num = [];
	$sum_count = 0;
	while ($row = $data->fetch_assoc()){
		if ($start > 1000 && (int)$row["image_num"] < 1001) {
			$sum_count = 1000;
		} else {
			$sum_count = 0;
		}
	    $image_num[] = (int)$row["image_num"] + $sum_count;
	}
	if (count($image_num) >= 500) {
		header( "Location: ./finish.php" );
		exit;
	}
	$source = range($start, $end);
	$filter = $image_num;
	$result = array_diff($source, $filter);
	shuffle($result);
	$image_num = str_pad($result[0], 4, 0, STR_PAD_LEFT);
	$image = glob("images/{$image_num}*.*")[0];
	$attributes = [["暗い", "明るい"], ["フィット", "ルーズ"], ["フォーマル", "カジュアル"], ["日常的な", "非日常的な"], ["シンプル", "ゴージャス"]];
	$scale = 5;
	$time_start = microtime(true);
?>
<head>
  <title>User Test</title>
  <link rel="stylesheet" href="style/answer.css">
</head>
<body>
	<h1><?php echo count($filter); ?> / 500</h1>
	<form action="save.php" method="post">
		<div class="container">
			<img src="<?php echo $image; ?>" alt="">
			<?php for ($i = 1; $i <= count($attributes); $i++) { ?>
				<ul>
					<div class="attr"><?php echo $attributes[$i-1][0]; ?></div>
					<?php for ($j = 1; $j <= $scale; $j++) { ?>
		 				<li>
		 		  			<input type="radio" id="<?php echo "option_{$i}_{$j}"; ?>" name="<?php echo "attr_{$i}"; ?>" value="<?php echo $j; ?>" required>
		 		  			<label for="<?php echo "option_{$i}_{$j}"; ?>"><?php echo $j; ?></label>
		 		  			<div class="check"></div>
		 				</li>
		 			<?php } ?>
		 			<div class="attr"><?php echo $attributes[$i-1][1]; ?></div>
				</ul>
			<?php } ?>
		</div>
		<input type="hidden" value="<?php echo $_COOKIE["userId"]; ?>" name="user_id">
		<input type="hidden" value="<?php echo $image; ?>" name="image">
		<input type="hidden" value="<?php echo $time_start; ?>" name="time_start">
		<input type="submit" value="SAVE" class="btn-flat-border-save" name="state">
		<input type="submit" value="NEXT" class="btn-flat-border-next" name="state">
	</form>
</body>