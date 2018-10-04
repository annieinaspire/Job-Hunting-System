<?php
session_start();
$occ=$_POST['occupation'];//echo $occ;
$loc=$_POST['location'];//echo $loc;
$work=$_POST['working_time'];
$edu=$_POST['education'];
$ex=$_POST['experience'];
$salary=$_POST['salary'];
$update_id=$_POST['update_job_id'];
//echo $occ.'&nbsp;'.$loc.'&nbsp;'.$work.'&nbsp;'.$edu.'&nbsp;'.$ex.'&nbsp;'.$salary.'&nbsp;'.$update_id;


$db_host="dbhome.cs.nctu.edu.tw";
$db_name="annie0111279_cs";
$db_user="annie0111279_cs";
$db_password="annieking";
$dsn="mysql:host=$db_host;dbname=$db_name";

try {
	$db=new PDO($dsn,$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql="SELECT id FROM occupation o WHERE o.occupation = '$occ' ";
	$sth = $db->prepare($sql); 
	$sth->execute(); 
	$result=$sth->fetchObject();
	$occ1=$result->id; //echo $occ1;
	
	$sql="SELECT id FROM location l WHERE l.location = '$loc' ";
	$sth = $db->prepare($sql); 
	$sth->execute(); 
	$result=$sth->fetchObject();
	$loc1=$result->id; //echo $loc1;
	
	//echo '<br>'. $occ1 . '&nbsp;'. $loc1 . '&nbsp;'. $acc1;
	//echo '<br>'. gettype($occ1) . '&nbsp;'. gettype($loc1) . '&nbsp;'. gettype($acc1);
	
	$occ2=intval($occ1);
	$loc2=intval($loc1);
	
	//echo '<br>'. $occ2 . '&nbsp;'. $loc2 . '&nbsp;'. $acc2;
	//echo '<br>'. gettype($occ2) . '&nbsp;'. gettype($loc2) . '&nbsp;'. gettype($acc2);
	
	
	$sql = "UPDATE recruit ".
		   "SET occupation_id=$occ2, location_id=$loc2, working_time='$work', education='$edu', experience='$ex', salary='$salary' ". 
		   "WHERE id=$update_id";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	echo "Update successfully!";
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}

/*echo '<meta http-equiv=REFRESH CONTENT=3;url=employer_login.php>';*/
$acc=$_SESSION['employer_exist'];
echo "<form action=\"employer_login.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"account\" value=\"$acc\">";
echo "<button type=\"submit\">Back to Login</button>";
echo "</form>";
?>