<head>
  <title>User Test</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
<?php
	if (!$_COOKIE["userId"]) {
		header( "Location: ./index.php" );
		exit;
	}
?>
	<h1>ご協力ありがとうございます。</h1>
	<h3>
		これからファッション画像について<br>
		以下の問いと印象評価をしていただきます。
	</h3>
	印象評価5段階5項目<br>
	<table>
		<tbody>
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
			<tr><td></td><td>シンプル</td><td>⇄</td><td>ゴージャス</td><td></td></tr>
			<tr><td></td><td>モダン</td><td>⇄</td><td>クラシック</td><td></td></tr>
			<tr><td></td><td>鈍い</td><td>⇄</td><td>鮮やか</td><td></td></tr>
			<tr><td></td><td>男性的</td><td>⇄</td><td>女性的</td><td></td></tr>
			<tr><td></td><td>フォーマル</td><td>⇄</td><td>カジュアル</td><td></td></tr>
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
		</tbody>
	</table>
	<h3>
		[ 注意事項 ]<br>
		画像は合計1000枚あり、1枚ずつ表示されます。<br>
		各ページ下2つのボタンから次のアクションを決めてください。<br>
	</h3>
	<table>
		<tbody>
			<tr><td></td><td></td><td></td><td></td></tr>
			<tr><td></td><td>「NEXT」</td><td>回答続行</td><td></td></tr>
			<tr><td></td><td>「SEVE」</td><td>回答終了</td><td></td></tr>
			<tr><td></td><td></td><td></td><td></td></tr>
		</tbody>
	</table>
	<h3>
		回答を再開したい場合はもう一度ログインしてください。<br>
		一度回答した画像は再度表示されることはありません。<br><br>
	</h3>
	<form action="answer.php" method="post">
		<input type="submit" value="スタート" class="btn-flat-border">
	</form>
	<h3>
		何か質問や問題がございましたらご連絡ください。<br><br>
		お茶の水女子大学人間文化創成科学研究科 理学専攻<br>
		博士課程前期1年 伊藤研 飯島緋理(いいじまあかり)<br>
		Itoh labo page : <a href='http://itolab.is.ocha.ac.jp/'>HERE</a><br>
		Email : <a href="mailto:g1620501@is.ocha.ac.jp">g1620501@is.ocha.ac.jp</a>
	</h3>
</body>