<?php
	session_start();
	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";


	try {
		$acc=$_POST['account'];
		
		$db=new PDO($dsn,$db_user,$db_password);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$str=$_POST['account'];
		$str = trim($str);
		$str = preg_replace('/\s(?=)/', '', $str);//str為去掉空白的帳號
		if($str!=$_POST['account']){
			echo"The account has blank space.Please retype it!";
			echo"<br>";
			echo"<form action=\"employer_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		$str=$_POST['password'];
		$str = trim($str);
		$str = preg_replace('/\s(?=)/', '', $str);//str為去掉空白的密碼
		if($str!=$_POST['password']){
			echo"The password has blank space.Please retype it!";
			echo"<br>";
			echo"<form action=\"employer_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		else{
			$sql = "SELECT account from employer WHERE account='$acc' ";
			$sth = $db->prepare($sql); 
			$sth->execute();
			$flag = 0;
			while ($result = $sth->fetchObject()){//檢查是否重複申請帳號
				$flag=1;
			}
			if($flag==0){
				$sql = "INSERT INTO employer (account, password ,phone ,mail)"
				. " VALUES(?,?,?,?)";
				$sth = $db->prepare($sql); 
				$sth->execute(array($_POST['account'], sha1($_POST['password']),$_POST['phone'],$_POST['email'])); 
				echo"add you to the employers succefully!";
				$_SESSION['employer_exist'] = $acc;//給session
			}
			else{
				echo"The account has been used by others. Please change into another one.";
				echo"<br>";
				echo"<form action=\"employer_regist.php\" method=\"POST\">";
				echo"<button type=\"submit\">Back to the regist</button>";
				echo"</form>";
			}
		}
	}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
	}	
?>
<html>
	<br>
	<form action="employer_login.php" method="POST">
		<button type="submit">Go</button>
	</form>
</html>