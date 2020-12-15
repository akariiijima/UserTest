<?php
	if (!$_COOKIE["userId"]) {
		header( "Location: ./index.php" );
		exit;
	}
?>
<head>
  <title>User Test</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
	<h1>ご協力ありがとうございます。</h1>
	<h3>
		これからファッション画像について<br>
		以下の問いと印象評価をしていただきます。
	</h3>
	画像特徴<br>
	#女性衣服 #着衣 #膝から首まで #白背景<br><br>
	印象評価5段階5項目<br>
	<table>
		<tbody>
			<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			<tr><td></td><td>「色彩」</td><td style="width:150px;">暗い</td><td>⇄</td><td style="width:150px;">明るい</td><td></td></tr>
			<tr><td></td><td>「立体感」</td><td style="width:150px;">フィット</td><td>⇄</td><td style="width:150px;">ルーズ</td><td></td></tr>
			<tr><td></td><td>「正統性」</td><td style="width:150px;">フォーマル</td><td>⇄</td><td style="width:150px;">カジュアル</td><td></td></tr>
			<tr><td></td><td>「穏健性」</td><td style="width:150px;">日常的な</td><td>⇄</td><td style="width:150px;">非日常的な</td><td></td></tr>
			<tr><td></td><td>「装飾性」</td><td style="width:150px;">シンプル</td><td>⇄</td><td style="width:150px;">ゴージャス</td><td></td></tr>
			<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		</tbody>
	</table>
	<br>[ 注意事項 ]<br>
	<h3>
		テスト画像は合計500枚あり、1枚ずつランダムに表示されます。<br>
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
		<font color="red">各画像の回答時間をログとして残しているため、<br>
			途中休憩したい場合は「SEVE」で回答を終了してください。<br></font>
		回答を再開したい場合はもう一度ログインしてください。<br>
		一度回答した画像は再度表示されることはありません。<br><br>
	</h3>
	[ テスト環境を以下のように設定してから開始してください ]<br>
	<div style="text-align:left;margin-left:35%;color:red">・自分のPCを使用<br>
	・ブラウザはChromeを使用(シークレットモードは使用不可)<br>
	・目が疲れない程度の明るさに設定してユーザーテスト中は変更しない<br></div>
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