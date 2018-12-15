<?php include 'header.php';?>
<?php include 'config.php';?>
<?php include 'Database.php';?>
<?php 
	$db =  new Database();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = mysqli_real_escape_string($db->link, $_POST['name']);
			$word = mysqli_real_escape_string($db->link, $_POST['word']);
			$hint = mysqli_real_escape_string($db->link, $_POST['hint']);
			$phrase = mysqli_real_escape_string($db->link, $_POST['keyphrase']);
			if($name != "" && $word !="" && $phrase !=""){
				$dupesql = "SELECT * FROM battle where (name = '$name' AND word = '$word' AND hint = '$hint' AND phrase = '$phrase')";
				$duperaw = $db->select($dupesql);
				if ($duperaw==null){
					$time = time();
					$query = "INSERT INTO battle(name, word, hint, phrase, tim) VALUES('$name', '$word', '$hint', '$phrase', $time)";
					$inser = $db->insert($query);
				}
				$dupesql = "SELECT id FROM battle where (name = '$name' AND word = '$word' AND hint = '$hint' AND phrase = '$phrase')";
				$duperaw = $db->select($dupesql);
				$result=$duperaw->fetch_assoc();
				$d = "dashboard.php?id=".$result['id'];
				$db->shift($d);
			}
		}
	?>
	<script type="text/javascript">
		function allLetter(inputtxt)  
		  {  
		   var letters = /^[A-Za-z]+$/;
		   if(inputtxt.value.match(letters) || inputtxt.value=="")  
		     {  
		      return true;  
		     }  
		   else  
		     {  
		     alert("Spaces Not Allowed in WORD");
		     document.getElementById("word").style.borderColor="red";
		     document.getElementById("word").style.borderWidth="3px";
		     return false;  
		     }  
		  }  
	</script>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<h1>HangMan Duel</h1>
	<div class="container">
	  <form action="challenger.php" method="post" name="form1">
	    <div class="row">
	      <div class="col-25">
	        <label for="fname">Challenger Name</label>
	      </div>
	      <div class="col-75">
	        <input type="text" id="name" maxlength="30" name="name" placeholder="Your name.." required>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-25">
	        <label for="fname">Word</label>
	      </div>
	      <div class="col-75">
	        <input type="text" id="word" maxlength="20" name="word" placeholder="Your Word of Choice.." required>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-25">
	        <label for="fname">Hint(if any)</label>
	      </div>
	      <div class="col-75">
	        <input type="text" id="hint" maxlength="30" name="hint" placeholder="Hint(30 chars max)">
	      </div>
	     <div class="row">
	      <div class="col-25">
	        <label for="fname">Battle Password</label>
	      </div>
	      <div class="col-75">
	        <input type="password" id="keyphrase" maxlength="15" name="keyphrase" placeholder="Password(15 chars max)" required>
	      </div>
	  	</div>
	    </div>
	    <div class="row"><div class="col-25"></div>
	    	<div class="col-75">
	      		<input type="submit" value="GENERATE BATTLE LINK" onclick="return allLetter(document.form1.word)">
	      	</div>
	    </div>
	  </form>
	</div>
</body>
</html>