<?php
	session_start();
	if(isset($_SESSION['employee_exist'])){
		header("location: employee_login.php");
	}
	if(isset($_SESSION['employer_exist'])){
		header("location: employer_login.php");
	}
?>
<html>
<center>
	<font size='30'>
		Job Vacancy
	</font>
</center>
<style type="text/css">
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #7f0000;
	
	-moz-border-radius-bottomleft:25px;
	-webkit-border-bottom-left-radius:25px;
	border-bottom-left-radius:25px;
	
	-moz-border-radius-bottomright:25px;
	-webkit-border-bottom-right-radius:25px;
	border-bottom-right-radius:25px;
	
	-moz-border-radius-topright:25px;
	-webkit-border-top-right-radius:25px;
	border-top-right-radius:25px;
	
	-moz-border-radius-topleft:25px;
	-webkit-border-top-left-radius:25px;
	border-top-left-radius:25px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:25px;
	-webkit-border-bottom-right-radius:25px;
	border-bottom-right-radius:25px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:25px;
	-webkit-border-top-left-radius:25px;
	border-top-left-radius:25px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:25px;
	-webkit-border-top-right-radius:25px;
	border-top-right-radius:25px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:25px;
	-webkit-border-bottom-left-radius:25px;
	border-bottom-left-radius:25px;
}.CSSTableGenerator tr:hover td{
	background-color:#ffffff;
		

}
.CSSTableGenerator td{
	vertical-align:middle;
		background:-o-linear-gradient(bottom, #f2b174 5%, #ffffff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f2b174), color-stop(1, #ffffff) ); 
	background:-moz-linear-gradient( center top, #f2b174 5%, #ffffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#f2b174", endColorstr="#ffffff");	background: -o-linear-gradient(top,#f2b174,ffffff);

	background-color:#f2b174;

	border:1px solid #7f0000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:10px;
	font-size:14px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #ff5656 5%, #7f0000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5656), color-stop(1, #7f0000) );
	background:-moz-linear-gradient( center top, #ff5656 5%, #7f0000 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff5656", endColorstr="#7f0000");	background: -o-linear-gradient(top,#ff5656,7f0000);

	background-color:#ff5656;
	border:0px solid #7f0000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #ff5656 5%, #7f0000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5656), color-stop(1, #7f0000) );
	background:-moz-linear-gradient( center top, #ff5656 5%, #7f0000 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff5656", endColorstr="#7f0000");	background: -o-linear-gradient(top,#ff5656,7f0000);

	background-color:#ff5656;
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
		$sql= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary ".
			   "FROM recruit r ". 
			   "LEFT JOIN occupation o ON r.occupation_id = o.id ".
			   "LEFT JOIN location l ON r.location_id = l.id";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
		$sql=  "SELECT r.id, r.employer_id, o.occupation, l.location, r.working_time, r.education, r.experience, r.salary ".
					   "FROM recruit r ". 
					   "LEFT JOIN occupation o ON r.occupation_id = o.id ".
					   "LEFT JOIN location l ON r.location_id = l.id";
				$sth = $db->prepare($sql);
				$sth->execute();
				
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
		}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>


	<head>
		<title>Login Form in PHP with Session</title>
	</head>
<body>
<h2>Jobs seeker's Login</h2>
<form action="employee_login.php" method="POST">
	<label>Username:</label><br>
	<input type="text" name="username"><br>
	<label>Password:</label><br>
	<input type="password" name="password">
	<button type="submit">Login</button>
</form>
<form action="employee_regist.php" method="POST">
	<button type="submit">Regist</button>
</form>

<h2>Employer's Login</h2>
<form action="employer_login.php" method="POST">
	<label>Username:</label><br>
	<input type="text" name="account">
	<br><label>Password:</label><br>
	<input type="password" name="password">
	<button type="submit">Login</button>
</form>
<form action="employer_regist.php" method="POST">
	<button type="submit">Regist</button>
</form>
</div>
</div>
</body>
</html>

