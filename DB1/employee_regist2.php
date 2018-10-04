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
		
		$db2=new PDO($dsn,$db_user,$db_password);
		// set the PDO error mode to exception
		$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$str=$_POST['account'];
		$str = trim($str);
		$str = preg_replace('/\s(?=)/', '', $str);//str為去掉空白的帳號
		if($str!=$_POST['account']){
			echo"The account has blank space.Please retype it!";
			echo"<br>";
			echo"<form action=\"employee_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		$str=$_POST['password'];
		$str = trim($str);
		$str = preg_replace('/\s(?=)/', '', $str);//str為去掉空白的密碼
		if($str!=$_POST['password']){
			echo"The password has blank space.Please retype it!";
			echo"<br>";
			echo"<form action=\"employee_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		else{
			$sql = "SELECT account from user WHERE account='$acc' ";
			$sth = $db->prepare($sql); 
			$sth->execute();
			$flag = 0;
			while ($result = $sth->fetchObject()){//檢查是否重複申請帳號
				$flag=1;
			}
			if($flag==0){
			
				$sql = "INSERT INTO user (account, password ,education ,expected_salary,phone,gender,age,email)"
				. " VALUES(?,?,?,?,?,?,?,?)";
				$sth = $db->prepare($sql); 
				$sth->execute(array($_POST['account'], sha1($_POST['password']),$_POST['education'],$_POST['salary'],$_POST['phone'], $_POST['gender'],$_POST['age'],$_POST['email'])); 
				//specialty
				$specialty=$_POST['array'];
				$sql="SELECT id FROM specialty";
				$sth = $db->prepare($sql); 
				$sth->execute();
				for(;$result = $sth->fetchObject();){
					if($specialty[$result->id]==1){
						$sql2 = "INSERT INTO user_specialty (user, specialty_id)". " VALUES(?,?)";
						$sth2 = $db2->prepare($sql2); 
						$sth2->execute(array($_POST['account'],$result->id));
					}
				}
				
				echo"add you to the employees succefully!";
				
				$_SESSION['employee_exist'] = $acc;//給session
			}
			else{
				echo"The account has been used by others. Please change into another one.";
				echo"<br>";
				echo"<form action=\"employee_regist.php\" method=\"POST\">";
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
	<form action="employee_login.php" method="POST">
		<button type="submit">Go</button>
	</form>
</html>