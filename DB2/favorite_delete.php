<?
	session_start();
	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";
	$acc=$_SESSION['employee_exist'];
	
	if($_SESSION['employee_exist']){
		
		try {
		$db=new PDO($dsn,$db_user,$db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id1=$_POST['df_id1'];
		$id2=$_POST['df_id2'];
		$sql = "DELETE FROM favorite WHERE user_id = '$id1' && recruit_id = '$id2' ";
		$sth = $db->prepare($sql);
		$sth->execute();
		echo "Delete successfully!";
		
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		
		echo '<form action="favorite.php" method="POST">';
		echo"<input type=\"hidden\" name=\"user_id\" value=\"$id1\">";
		echo '<button type="submit">Back to favorite list</button>';
		echo '</form>';
	}
	else
	{ 
		echo "You can't visit this page.";
		echo'<form action="employer_login.php" method="POST">';
		echo'<button type="submit">Back to login</button>';
		echo'</form>';
	}
	
?>
