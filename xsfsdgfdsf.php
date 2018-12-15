<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<h1>HangMan Duel</h1>
	<div class="verify">
		<form action="battle.php" method="post" name="form1">
			<label idfor="fname">Enter The Details To Battle</label>
			<input type="text" id="ver" maxlength="30" name="name" placeholder="Your Name.." required>
			<input type="number" id="ver" name="id" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="8" min="1" placeholder="Game Id" required>
			<input type="password" id="ver" maxlength="15" name="phrase" placeholder="Battle Password" required>
			<input id="pass2" type="submit" value="Continue">
		</form>
	</div>
</body>
</html>