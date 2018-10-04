<?php
session_start();?>
<style type="text/css">
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #bfbf5d;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#7af271; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#baf282; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #bfbf5d;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:7px;
	font-size:15px;
	font-family:Comic Sans MS;
	font-weight:bold;
	color:#207edb;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #6198d3 5%, #a8cff7 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #6198d3), color-stop(1, #a8cff7) );
	background:-moz-linear-gradient( center top, #6198d3 5%, #a8cff7 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#6198d3", endColorstr="#a8cff7");	background: -o-linear-gradient(top,#6198d3,a8cff7);

	background-color:#6198d3;
	border:0px solid #bfbf5d;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Comic Sans MS;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #6198d3 5%, #a8cff7 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #6198d3), color-stop(1, #a8cff7) );
	background:-moz-linear-gradient( center top, #6198d3 5%, #a8cff7 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#6198d3", endColorstr="#a8cff7");	background: -o-linear-gradient(top,#6198d3,a8cff7);

	background-color:#6198d3;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<?

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

$db_host="dbhome.cs.nctu.edu.tw";
$db_name="annie0111279_cs";
$db_user="annie0111279_cs";
$db_password="annieking";
$dsn="mysql:host=$db_host;dbname=$db_name";

try {
    $db=new PDO($dsn,$db_user,$db_password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
	
	
	$account = $_POST['username'];
	$account = trim($account);
	$account = preg_replace('/\s(?=)/', '', $account);
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM user WHERE account = '$account'";
	$sth = $db->prepare($sql);
	$sth->execute();
	$result=$sth->fetchObject();
	
	if($account != null && $password != null && $result->account == $account && $result->password == sha1($password) || isset($_SESSION['employee_exist']))
	{
        //將帳號寫入session，方便驗證使用者身份
       
		if(isset($_SESSION['employee_exist'])){//由regist2進來
			$acc=$_SESSION['employee_exist'];
		}
		else{
			$_SESSION['employee_exist']=$account;//由homepage登入進來
			$acc=$account;
		} 
		echo "Hello! ".$acc;
		$sql= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary ".
			   "FROM recruit r ". 
			   "LEFT JOIN occupation o ON r.occupation_id = o.id ".
			   "LEFT JOIN location l ON r.location_id = l.id";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
		echo "<p class=\"CSSTableGenerator\">";
			echo "<table border=\"1\">";
				echo"<tr>";
				echo"<td>Occupation</td>";
				echo"<td>Location</td>";
				echo"<td>Work Time</td>";
				echo"<td>Education Required</td>";						
				echo"<td>Experience</td>";
				echo"<td>Salary</td>";
				echo"</tr>";
			while($result = $sth -> fetchObject()){
				echo"<tr>";
					$id2=$result->id;//recruit id
					echo "<td>";echo $result->occupation;echo "</td>";
					echo "<td>";echo $result->location;echo "</td>";
					echo "<td>";echo $result->working_time;echo "</td>";
					echo "<td>";echo $result->education;echo "</td>";
					echo "<td>";echo $result->experience;echo "</td>";
					echo "<td>";echo $result->salary;echo "</td>";
				echo"</tr>";
			}
			echo "</table>";
		echo "</p>";
		echo "<form action=\"logout.php\" method=\"POST\">";
        echo "<button type=\"submit\">Logout </button>";
		echo "</form>";
		
	}
	else
	{
        echo 'login failed!';
		echo "<form action=\"homepage.php\" method=\"POST\">";
        echo "<button type=\"submit\">Back to the homepage </button>";
		echo "</form>";
	}
	
	}
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }

?>


