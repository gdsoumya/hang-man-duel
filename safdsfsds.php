<link rel="stylesheet" type="text/css" href="style1.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="b">
	<h1>HangMan Duel</h1>
	<div id="chal" class="chlnger">
		<b>Challenger : </b><br><?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8');?>
	</div>
	<div class="lnk">
	</div>
	<div class="inf"  style='margin-top: -1%;'>
		<div class="iw" style="width: 35%;margin: 0px 7.5%;border: .8vw solid black;border-radius: 30px;padding-bottom:5px;">Game Id : <?php echo htmlspecialchars(strtoupper($result['id']), ENT_QUOTES, 'UTF-8');?></div>
		<div style="width: 48%;margin: 0px auto;border: .8vw solid black;border-radius: 30px;font-size: 3.5vw;padding-bottom:5px;">Pass : <?php echo htmlspecialchars($result['phrase'], ENT_QUOTES, 'UTF-8');?></div>
	</div>
	<div class="inf">
	    <div class="iw">
        	WORD : <?php echo htmlspecialchars(strtoupper($result['word']), ENT_QUOTES, 'UTF-8');?>
	    </div>
	    <div id="it">
	    </div>
	</div>
	<div id="res" class="reslt">
		<div class="nv">
			<label>Victorious</label>
			<?php 
				$query = "SELECT * FROM ven WHERE (id = '$id' AND res = '1')";
				$post = $db->select($query);
				if($post){
					while($result=$post->fetch_assoc()){
						$v = "<p>".htmlspecialchars($result['pname'], ENT_QUOTES, 'UTF-8')."</p>";
						echo $v; }
					} else echo "<p>No One Won Yet</p>";
			?>
		</div>
		<div class="nd">
			<label>Defeated</label>
			<?php 
				$query = "SELECT * FROM ven WHERE (id = '$id' AND res = '0')";
				$post = $db->select($query);
				if($post){
					while($result=$post->fetch_assoc()){
						$v = "<p>".htmlspecialchars($result['pname'], ENT_QUOTES, 'UTF-8')."</p>";
						 echo $v; }
				}
				else echo "<p>No One Lost Yet</p>";
			?>
		</div>
	</div>
	 <script>
      function auto_load(){
        $.ajax({
          type: "POST",
          url: "dashboard.php",
          data: { 
		        'id': '<?php echo $id;?>', 
		        'phrase': '<?php echo $phrase;?>' // <-- the $ sign in the parameter name seems unusual, I would avoid it
		    },
          cache: false,
          dataType: 'html',
          success: function(data){
             $(".nv").html($(data).find(".nv").html());$(".nd").html($(data).find(".nd").html());
          } 
        });
      }     
      setInterval(auto_load,10000);
   </script>
	<script>
		var x = window.location.href;
		var l = x.substring(0,x.lastIndexOf('/'))+"/battle.php";
	$('.lnk').html("<b>BATTLE LINK : </b><a href='battle.php' target='_blank'>"+l+"</a>");
	var x = setInterval(function() {
		var now = new Date().getTime();
		var distance = <?php echo $t;?> - now;
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		document.getElementById("it").innerHTML = "Expires in : "+hours + "h "+ minutes + "m " + seconds + "s ";
		if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("it").innerHTML = "EXPIRED";
		}
	}, 1000);
	</script>
</body>
</html>