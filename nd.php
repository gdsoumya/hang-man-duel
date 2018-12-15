<?php include 'config.php';?>
<?php include 'Database.php';?>
<?php 
	$db =  new Database();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = mysqli_real_escape_string($db->link, $_POST['id']);
			if($id != ""){
				$query = "SELECT * FROM ven WHERE (serial = '$id')";
				$post = $db->select($query);
				if(!$post)
					exit();
				$result=$post->fetch_assoc();
				$query = "UPDATE ven SET res='0' WHERE (serial = '$id')";
				$inser = $db->update($query);
			}
		}
?>