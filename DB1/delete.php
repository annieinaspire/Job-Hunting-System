<?
	session_start();
	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";
	$acc=$_SESSION['employer_exist'];
	try {
		$db=new PDO($dsn,$db_user,$db_password);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id=$_POST['delete_job_id'];
		$sql = "DELETE FROM recruit WHERE id=$id";
		$sth = $db->prepare($sql);
		$sth->execute();
		echo "Delete the job successfully!";
		
		$sql="select * from recruit where id=$id ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$result = $sth -> fetchObject();
		
		
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>
<form action="employer_login.php" method="POST">
	<?echo"<input type=\"hidden\" name=\"account\" value=\"$acc\">";?>
	<button type="submit">Back</button>
</form>