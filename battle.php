<?php include 'header.php';?>
<?php include 'config.php';?>
<?php include 'Database.php';?>
<?php
$flag = 0;$f=0;
	$db =  new Database();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = mysqli_real_escape_string($db->link, $_POST['id']);
			$phrase = mysqli_real_escape_string($db->link, $_POST['phrase']);
			$pname = mysqli_real_escape_string($db->link, $_POST['name']);
			if($id != ""){
				$query = "SELECT * FROM battle WHERE (id = '$id')";
				$post = $db->select($query);
				if(!$post)
					echo '<script>alert("Game Id Doesn\'t Exist");window.location = "battle.php";</script>';
				else{
					$result=$post->fetch_assoc();
					if(strcmp($result['phrase'],$phrase)!=0)
						echo '<script>alert("Password Wrong");window.location = "battle.php";</script>';
					else{
						$t = time()-$result['tim'];
						if($t >= 21600)
							$f = 1;
						$ip = $_SERVER['REMOTE_ADDR'];
						$query = "SELECT * FROM ven WHERE (ip = '$ip' AND id = '$id' AND res != '999')";
						$post = $db->select($query);
						if(!$post){
							$query = "INSERT INTO ven(id, ip, pname) VALUES('$id', '$ip', '$pname')";
							$inser = $db->insert($query);
							$query = "SELECT * FROM ven WHERE (id = '$id'AND ip = '$ip' AND pname = '$pname')";
							$post = $db->select($query);
							$result1 = $post->fetch_assoc();
						}
						else
							$flag = 1;
						include('xsdsfdfsg.php');
					}
				}
			}
		}
		else
			include('xsfsdgfdsf.php');
?>
