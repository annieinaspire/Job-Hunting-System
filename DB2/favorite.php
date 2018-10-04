<?
	session_start();
?>
<html>
<?php 
$db_host="dbhome.cs.nctu.edu.tw";
$db_name="annie0111279_cs";
$db_user="annie0111279_cs";
$db_password="annieking";
$dsn="mysql:host=$db_host;dbname=$db_name";
$acc=$_SESSION['employee_exist'];

?>

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


<?php
if($_SESSION['employee_exist']){

	echo '<form action="logout.php" method="POST">';
	echo '<input type="hidden" name="account" value="$acc">';
	echo '<button type="submit"> Logout </button>';
	echo '</form>';

	echo '<center>';
		echo "<font size='30'>Favorite List</font>";
	echo '</center>';
	
	try {
		echo 'Hello! '.$acc;

		$db=new PDO($dsn,$db_user,$db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db1=new PDO($dsn,$db_user,$db_password);
		$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql= "SELECT id FROM user WHERE account='$acc' ";
		$sth = $db->prepare($sql); 
		$sth->execute(); 
		$result=$sth->fetchObject();
		$user_id=$result->id;
		
		$sql= "SELECT recruit_id FROM favorite WHERE user_id='$user_id' ";
		$sth = $db->prepare($sql); 
		$sth->execute(); 
		
		
		
		
				echo "<p class=\"CSSTableGenerator\">";
				echo "<table border=\"1\">";
				echo"<tr>";
				echo"<td>ID</td>";
				echo"<td>Occupation</td>";
				echo"<td>Location</td>";
				echo"<td>Work Time</td>";
				echo"<td>Education Required</td>";						
				echo"<td>Experience</td>";
				echo"<td>Salary</td>";
				echo"<td>Options</td>";
				echo"</tr>";
				while($result=$sth->fetchObject())
				{
					
					$sql1= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary , r.id ".
						  "FROM recruit r ". 
						  "LEFT JOIN occupation o ON r.occupation_id = o.id ".
						  "LEFT JOIN location l ON r.location_id = l.id ".
						  "LEFT JOIN favorite f ON r.id = $result->recruit_id ";
					$sth1 = $db1->prepare($sql1); 
					$sth1->execute(); 
					$result1=$sth1->fetchObject();
					echo"<tr>";
					echo "<td>";echo $result1->id;echo "</td>";
					echo "<td>";echo $result1->occupation;echo "</td>";
					echo "<td>";echo $result1->location;echo "</td>";
					echo "<td>";echo $result1->working_time;echo "</td>";
					echo "<td>";echo $result1->education;echo "</td>";
					echo "<td>";echo $result1->experience;echo "</td>";
					echo "<td>";echo $result1->salary;echo "</td>";
					echo "<td>";
					echo "<form action=\"favorite_delete.php\" method=\"POST\">";
					echo "<input type=\"hidden\" name=\"df_id1\" value=\"$user_id\">";
					echo "<input type=\"hidden\" name=\"df_id2\" value=\"$result1->id\">";
					echo "<button type=\"submit\"> Delete </button>";
					echo "</form>";
					echo "</td>";
					//echo"<tr>";
				}
				echo "</table>";
				echo "</p>";
		
		echo "<form action=\"employee_login.php\" method=\"POST\">";
		echo "<button type=\"submit\"> Back to job vacancy </button>";
		echo "</form>";
		
		
		
	}
	catch(PDOException $e){
		echo "Connection fsailed: " . $e->getMessage();
	}
}
else
{ 
	echo "You can't visit this page.";
	echo'<form action="employer_login.php" method="POST">';
	echo'<button type="submit">Back to login</button>';
	echo'</form>';
}
?>



</html>