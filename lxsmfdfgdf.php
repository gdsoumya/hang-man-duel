<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<h1>HangMan Duel</h1>
	<div class="verify">
		<form class="ver" action="dashboard.php" method="post" name="form1">
			<label id="pass" for="fname">Enter Details To continue to Dashboard</label>
			<?php if(strcasecmp("hidden", $type)==0)echo '<label style="font-family: Concert One, cursive;" id="pass" for="fname">Game Id : '.$id.'</label><br>'; ?>
			<input id="ver" type="<?php echo $type;?>" name="id" 
			<?php 
				if(strcasecmp("hidden", $type)==0)
			        echo 'value="'.htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8').'"';
			    else
			    	echo 'placeholder="Game Id"';
			    ?>
			 >
			 <input id="ver" type="password" id="phrase" maxlength="15" name="phrase" placeholder="Password" required>
			<input id="pass2" type="submit" value="Continue">
		</form>
	</div>
</body>
</html>