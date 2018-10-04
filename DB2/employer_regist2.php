<?php
	session_start();
	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";


	try {
		$acc=$_POST['account'];
		$pass=$_POST['password'];
		$db=new PDO($dsn,$db_user,$db_password);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$str=$_POST['account'];
		$str = trim($str);
		$str = preg_replace('/\s(?=)/', '', $str);//str為去掉空白的帳號
		
		$str2=$_POST['password'];
		$str2 = trim($str2);
		$str2 = preg_replace('/\s(?=)/', '', $str2);//str為去掉空白的密碼
		
		if($acc==NULL){
			echo "Your Account is all blank.\n";
			echo "What the xxx.!\n";
			echo"<form action=\"employer_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		else if($pass==NULL){
			echo "Your password is all blank.\n";
			echo "What the xxx.!\n";
			echo"<form action=\"employer_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		else if($str!=$_POST['account']){
			echo"The account has blank space.Please retype it!";
			echo"<br>";
			echo"<form action=\"employer_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
		}
		
		else if($str2!=$_POST['password']){
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
				
				echo'<br>';
				echo'<form action="employer_login.php" method="POST">';
				echo'<button type="submit">Go</button>';
				echo'</form>';
			}
			else{
				echo"The account has been used by others. Please change into another one.";
				echo"<br>";
				echo"<form action=\"employer_regist.php\" method=\"POST\">";
				echo"<button type=\"submit\">Back to the regist</button>";
				echo"</form>";
				
			}
		}$flag = 0;
		
	}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
	}	
?>
