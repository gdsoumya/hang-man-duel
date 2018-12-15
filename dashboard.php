<?php include 'header.php';?>
<?php include 'config.php';?>
<?php include 'Database.php';?>
<?php
	$db =  new Database();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = mysqli_real_escape_string($db->link, $_POST['id']);
			$phrase = mysqli_real_escape_string($db->link, $_POST['phrase']);
			if($id != ""){
				$query = "SELECT * FROM battle WHERE (id = '$id')";
				$post = $db->select($query);
				if(!$post)
					echo '<script>alert("Game Id Doesn\'t Exist");window.location = "dashboard.php";</script>';
				else{
					$result=$post->fetch_assoc();
					if(strcmp($result['phrase'],$phrase)!=0)
					echo '<script>alert("Password Wrong");window.location = "dashboard.php";</script>';
					$t = ($result['tim']+21600)*1000;
					include('safdsfsds.php');
				}
			}
		}
	else if(isset($_GET["id"])){
		$id = $_GET["id"];
		if(is_numeric($id) && $id>=1)
			$id=floor($id);
		else{
			$db->shift("index.html");
		}
		$query = "SELECT * FROM battle WHERE (id = '$id')";
		$post = $db->select($query);
		if(!$post){
			$db->shift("index.html");
		}
		else
		$result=$post->fetch_assoc();
		$type="hidden";
		include 'lxsmfdfgdf.php';
	}
	else{
		$type="text";
		include 'lxsmfdfgdf.php';
	}
?>