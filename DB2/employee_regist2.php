<?
	session_start();
?>

<?php
$db_host="dbhome.cs.nctu.edu.tw";
$db_name="annie0111279_cs";
$db_user="annie0111279_cs";
$db_password="annieking";
$dsn="mysql:host=$db_host;dbname=$db_name";

try {
	$acc=$_POST['account'];
	$pass=$_POST['password'];
    $db=new PDO($dsn,$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db1=new PDO($dsn,$db_user,$db_password);
    $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db2=new PDO($dsn,$db_user,$db_password);
	$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$str=$_POST['account'];
	$str = trim($str);
	$str = preg_replace('/\s(?=)/', '', $str);//str為去掉所有空白後的帳號
	
	$str2=$_POST['password'];
	$str2 = trim($str2);
	$str2 = preg_replace('/\s(?=)/', '', $str2);//str2為去掉所有空白的密碼
	if($acc==NULL){
		echo "Your Account is all blank.\n";
		echo "What the xxx.!\n";
		echo"<form action=\"employee_regist.php\" method=\"POST\">";
		echo"<button type=\"submit\">Back to the regist</button>";
		echo"</form>";
	}
	else if($pass==NULL){
		echo "Your password is all blank.\n";
		echo "What the xxx.!\n";
		echo"<form action=\"employee_regist.php\" method=\"POST\">";
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
		$sql = "SELECT account from user WHERE account='$acc' ";
		$sth = $db->prepare($sql); 
		$sth->execute();
		$flag = 0;
		while ($result = $sth->fetchObject()){
			$flag=1;
		}
		if($flag==0){
			$sql = "INSERT INTO user (account, password ,education ,expected_salary,phone,gender,age,email)"
			. " VALUES(?,?,?,?,?,?,?,?)";
			$sth = $db->prepare($sql); 
			$sth->execute(array($_POST['account'], sha1($_POST['password']),$_POST['education'],$_POST['salary'],$_POST['phone'], $_POST['gender'],$_POST['age'],$_POST['email'])); 
			
			//specialty
			$specialty=$_POST['array'];
			
			$sql1="SELECT id FROM user WHERE account = '$acc'";
			$sth1 = $db->prepare($sql1); 
			$sth1->execute();
			$result1 = $sth1->fetchObject();
			
			$sql="SELECT id FROM specialty";
			$sth = $db->prepare($sql); 
			$sth->execute();
			
			for(;$result = $sth->fetchObject();){
				if($specialty[$result->id]==1){
					$sql2 = "INSERT INTO user_specialty (user_id, specialty_id)". " VALUES(?,?)";
					$sth2 = $db2->prepare($sql2); 
					$sth2->execute(array($result1->id,$result->id));
				}
			}
			
			$_SESSION['employee_exist'] = $acc;//給session
			
			echo"add you to the employees succefully!";
			
			echo "<form action=\"employee_login.php\" method=\"POST\">";
			echo "<button type=\"submit\">GO</button>";
			echo "</form>";
		}
		else{
			echo"The account has been used by others. Please change into another one.";
			echo"<br>";
			echo"<form action=\"employee_regist.php\" method=\"POST\">";
			echo"<button type=\"submit\">Back to the regist</button>";
			echo"</form>";
			
		}
		$flag==0;
	}
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
?>