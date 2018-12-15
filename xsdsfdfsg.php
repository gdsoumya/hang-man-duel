<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		(function() {
		   'use strict';

		   var i,c,ch=0,s=atob("<?php echo htmlspecialchars(base64_encode($result['word']), ENT_QUOTES, 'UTF-8');?>").toUpperCase(),cc=0;
		function init(){ 
		   i=document.getElementById('keyboard').getElementsByTagName('input');
		for(c=0;c<i.length;c++) {
		if(i[c].type==='button') {
		   i[c].addEventListener('onclick',makeClickHandler());
		   }
		  }
		 }
		function makeClickHandler(){
		   if(ch<=4 && cc!=s.length){var f=0;
			   i[c].onclick=function(){
			   for(var k=0;k<s.length;k++)
				   	if(s.charAt(k)==this.value){
				   		var t = 'l'+(k+1).toString();
				   		if(document.getElementById(t).innerHTML==""){
					   		cc++;
					   		document.getElementById(t).innerHTML=this.value;
					   		f=1;
					   	}
				   	}
				if(cc==s.length){
					document.getElementById("keyboard").style.display="none";
					document.getElementById("result").innerHTML="VICTORIOUS";
					document.getElementById("result").style.color="lawngreen";
					document.getElementById("result").style.display="block";
					document.getElementById("ch").style.display="inline";
					post('nv.php','id=<?php echo $result1['serial'];?>');
				}
				if(f==0){
			   		ch++;
			   		if(ch<=4){
				   	var t='c'+ch.toString();
				   	var x =document.getElementsByClassName(t);
				   	for (var k = 0; k < x.length; k++) 
	    				x[k].style.display="block";}
	    			if(ch==4){
	    				for(var k=0;k<s.length;k++){
	    					var t = 'l'+(k+1).toString();
				   			document.getElementById(t).innerHTML=s.charAt(k);}
				   		document.getElementById("keyboard").style.display="none";
						document.getElementById("result").innerHTML="DEFEATED";
						document.getElementById("result").style.color="red";
						document.getElementById("result").style.display="block";
						document.getElementById("ch").style.display="inline";
						post('nd.php','id=<?php echo $result1['serial'];?>');
	    			}
				}
			  };
			}
		}
		function post(path, params) {
		    var http = new XMLHttpRequest();
			var url = path;
			http.open("POST", url, true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function() {
			    if(http.readyState == 4 && http.status == 200) {
			    }
			}
			http.send(params);
		}
		   window.addEventListener?
		   window.addEventListener('load',init,false):
		   window.attachEvent('onload',init);
		})();
	</script>
	<script type="text/javascript">
			var v = <?php echo $f ;?>;
			if(v==1){
				alert("Battle Link has Expired");
				window.location = "index.html";}
			var f = <?php echo $flag; ?>;
			if(f==1){
				alert("You can fight a battle only Once per System");
				window.location = "index.html";
			}
		$(document).ready(function(){
			var height = $('#chal').height();
		    var font_size = $('#chal').css('font-size');
		    var scale = 1.15;var line_height = Math.floor(parseInt(font_size) * scale);
		    var rows = height / line_height;
		    if(Math.round(rows) == 2){
		    	$('#chal').html("<b>Challenger : </b><br><?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8');?>");
		    	var s = (line_height*1.2).toString()+"px";$('#chal' ).css('line-height',s);}
		});
	</script>
</head>
<body>
<div id="chal" class="challanger">
	<b>Challenger : </b><?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8');?>
</div>
<div class="hint">
	<b>Hint: </b><?php $len=strlen($result['hint']);$st=$result['hint'];
	if($st == null)
		echo "N/A";
	else{
		for($x=0;$x<$len;$x++)
			if($st{$x} != ' ')
				break;
		if($x==$len)
			echo "N/A";
		else{$st{0}=strtoupper($st{0});
			echo htmlspecialchars($st, ENT_QUOTES, 'UTF-8');
		}
	}	?>
</div>
<div class="outter">
	<div class="container">
		<div class="podium">
			<div class="beam1"></div>
			<div class="beam2"></div>
			<div class="beam3"></div>
		</div>
		<div class="man">
			<div class="rope c1"></div>
			<div class="stick_head c1"></div>
			<div class="body c2"></div>
			<div class="left_arm c3"></div>
			<div class="right_arm c3"></div>
			<div class="left_leg c4"></div>
			<div class="right_leg c4"></div>
		</div>
	</div>
</div>
<div class="word">
	<?php
		for($x=1;$x<=strlen($result['word']);$x++)
			echo "<div id='l$x' class='l'></div>";
	?>
</div>
<div id="keyboard">
<div>
 <input type="button" value="Q">
 <input type="button" value="W">
 <input type="button" value="E">
 <input type="button" value="R">
 <input type="button" value="T">
 <input type="button" value="Y">
 <input type="button" value="U">
 <input type="button" value="I">
 <input type="button" value="O">
 <input type="button" value="P">
</div>
<div>
 <input type="button" value="A">
 <input type="button" value="S">
 <input type="button" value="D">
 <input type="button" value="F">
 <input type="button" value="G">
 <input type="button" value="H">
 <input type="button" value="J">
 <input type="button" value="K">
 <input type="button" value="L">
</div>
<div>
 <input type="button" value="Z">
 <input type="button" value="X">
 <input type="button" value="C">
 <input type="button" value="V">
 <input type="button" value="B">
 <input type="button" value="N">
 <input type="button" value="M">
</div>
</div>
<div id="result"></div>
<a id="ch" href="index.html">Challenge Others</a>
</body>
</html>