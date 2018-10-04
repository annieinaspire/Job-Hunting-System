<?php
	session_start();
//echo $_POST['account'].'&nbsp;';


class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
$acc=$_SESSION['employer_exist'];
$occ_id=$_POST['occupation'];
$loc_id=$_POST['location'];

$work=$_POST['working_time'];
$edu=$_POST['education'];
$ex=$_POST['experience'];
$salary=$_POST['salary'];
//echo $occ.'&nbsp;'.$loc.'&nbsp;'.$work.'&nbsp;'.$edu.'&nbsp;'.$ex.'&nbsp;'.$salary;

$db_host="dbhome.cs.nctu.edu.tw";
$db_name="annie0111279_cs";
$db_user="annie0111279_cs";
$db_password="annieking";
$dsn="mysql:host=$db_host;dbname=$db_name";

try {
    $db=new PDO($dsn,$db_user,$db_password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql="select id from employer where account = '$acc' ";
	$sth = $db->prepare($sql); 
	$sth->execute(); 
	$result=$sth->fetchObject();
	$acc1=$result->id;
	
	$acc2=intval($acc1);
	
    
	$sql="INSERT INTO recruit (employer_id, occupation_id, location_id, working_time, education, experience, salary)".
	" VALUES ( ?, ?, ?, ?, ?, ?, ?)";
	$sth = $db->prepare($sql); 
	$sth->execute(array($acc2,$occ_id,$loc_id,$work,$edu,$ex,$salary));
	echo"add the job successfully!";
	
}
catch(PDOException $e){
    echo "Connection fsailed: " . $e->getMessage();
}
	
?>
<form action="employer_login.php" method="POST">
	<?echo"<input type=\"hidden\" name=\"account\" value=\"$acc\">";?>
	<button type="submit">Go back</button>
</form>