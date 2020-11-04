<head>
  <title>User Test</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
	<h1>印象評価ユーザーテスト</h1>
	<h4>
		お茶の水女子大学人間文化創成科学研究科 理学専攻<br>
		博士課程前期1年 伊藤研 飯島緋理(いいじまあかり)<br>
		Itoh labo page : <a href='http://itolab.is.ocha.ac.jp/'>HERE</a><br>
		Email : <a href="mailto:g1620501@is.ocha.ac.jp">g1620501@is.ocha.ac.jp</a>
	</h4>

	<div class="tab-wrap">
	    <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" />
	    <label class="tab-label" for="TAB-01">ログイン</label>
	    <div class="tab-content">
	    	<form action="signup.php" method="post">
	    		<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="ユーザー名" name="username" value="" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="パスワード" name="passward" required>
					</label>
				</div>
				<input type="submit" value="ログイン" class="btn-flat-border">
			</form>
	    </div>

	    <input id="TAB-02" type="radio" name="TAB" class="tab-switch" />
	    <label class="tab-label" for="TAB-02">新規登録</label>
	    <div class="tab-content">
	    	<form action="signin.php" method="post">
	        	<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="ユーザー名" name="username" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="メールアドレス" name="mail" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="パスワード" name="passward" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="パスワード(再入力)" name="re_passward" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="年齢" name="age" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="性別" name="sex" required>
					</label>
				</div>
				<div class="cp_iptxt">
					<label class="ef">
						<input type="text" placeholder="国籍" name="country" required>
					</label>
				</div>
				<input type="submit" value="登録" class="btn-flat-border">
			</form>
	    </div>
	</div>
</body>