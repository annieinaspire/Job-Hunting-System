<?php session_start(); ?> 
<html>
<style type="text/css">
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:4px;
	-webkit-border-bottom-left-radius:4px;
	border-bottom-left-radius:4px;
	
	-moz-border-radius-bottomright:4px;
	-webkit-border-bottom-right-radius:4px;
	border-bottom-right-radius:4px;
	
	-moz-border-radius-topright:4px;
	-webkit-border-top-right-radius:4px;
	border-top-right-radius:4px;
	
	-moz-border-radius-topleft:4px;
	-webkit-border-top-left-radius:4px;
	border-top-left-radius:4px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:4px;
	-webkit-border-bottom-right-radius:4px;
	border-bottom-right-radius:4px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:4px;
	-webkit-border-top-left-radius:4px;
	border-top-left-radius:4px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:4px;
	-webkit-border-top-right-radius:4px;
	border-top-right-radius:4px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:4px;
	-webkit-border-bottom-left-radius:4px;
	border-bottom-left-radius:4px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#ffffff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:9px;
	font-size:14px;
	font-family:Arial Black;
	font-weight:bold;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #020100 5%, #c9bfb5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #020100), color-stop(1, #c9bfb5) );
	background:-moz-linear-gradient( center top, #020100 5%, #c9bfb5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#020100", endColorstr="#c9bfb5");	background: -o-linear-gradient(top,#020100,c9bfb5);

	background-color:#020100;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Georgia;
	font-weight:bold;
	color:#f2f2f2;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #020100 5%, #c9bfb5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #020100), color-stop(1, #c9bfb5) );
	background:-moz-linear-gradient( center top, #020100 5%, #c9bfb5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#020100", endColorstr="#c9bfb5");	background: -o-linear-gradient(top,#020100,c9bfb5);

	background-color:#020100;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<?php
	$employer_id = $_POST['employer_id'];
	$edit_job_id = $_POST['edit_job_id'];

	class TableRows extends RecursiveIteratorIterator { 
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}

		function current() {
			return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
		}

		function beginChildren(){ 
			echo "<tr>"; 
		} 

		function endChildren(){ 
			echo "</tr>" . "\n";
		}
	} 

		$db_host="dbhome.cs.nctu.edu.tw";
		$db_name="annie0111279_cs";
		$db_user="annie0111279_cs";
		$db_password="annieking";
		$dsn="mysql:host=$db_host;dbname=$db_name";
		
	if($_SESSION['employer_exist']){	
		try {
			$db=new PDO($dsn,$db_user,$db_password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$db1=new PDO($dsn,$db_user,$db_password);
			$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "<form action=\"update.php\" method=\"POST\">";
			$sql="SELECT r.id, r.employer_id, o.occupation, l.location, r.working_time, r.education, r.experience, r.salary ".
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
				echo"<td>Salary</td>"."<td>&nbsp;Operation</td>";
				echo"</tr>";
			while($result = $sth -> fetchObject()){
				echo"<tr>";
				if($result->id==$edit_job_id){
					$sql1="Select account from employer where id=$result->employer_id";
					$sth1 = $db1->prepare($sql1);
					$sth1->execute();
					$result2 = $sth1 -> fetchObject();
					
					
					echo "<td>";
						echo "<select name=\"occupation\">";
					
							$sql1="SELECT occupation FROM occupation";
							$sth1 = $db1->prepare($sql1); 
							$sth1->execute();
							while($result1 = $sth1->fetchObject()){
								echo "<option value=$result1->occupation>"; 
								echo $result1->occupation; 
								echo "</option>"; 
							}
						echo "</select>";
					echo "</td>";
					echo "<td>";
						echo "<select name=\"location\">";
							$sql1="SELECT location FROM location";
							$sth1 = $db1->prepare($sql1); 
							$sth1->execute();
							while($result1 = $sth1->fetchObject()){
								echo "<option value=$result1->location>"; 
								echo $result1->location; 
								echo "</option>"; 
							}
						echo "</select>";
					echo "</td>";
					echo "<td>";
						echo"<select name=\"working_time\">";
						echo"<option value=\"8hrs per day\">8hrs per day</option>";
						echo"<option value=\"9hrs per day\">9hrs per day</option>";
						echo"<option value=\"10hrs per day\">10hrs per day</option>";
						echo"<option value=\"11hrs per day\">11hrs per day</option>";
						echo"<option value=\"12hrs per day\">12hrs per day</option>";
						echo"</select>";
					echo "</td>";
					echo "<td>";
						echo"<select name=\"education\">";
						echo"<option value=\"Junior High School\">Junior High School</option>";
						echo"<option value=\"Undergraduate School\">Undergraduate School</option>";
						echo"<option value=\"Senior High School\">Senior High School</option>";
						echo"<option value=\"Graduate School\">Graduate School</option>";
						echo"<option value=\"Elementary School\">Elementary School</option>";
						echo"</select>";
					echo "</td>";
					echo "<td>";
						echo"<input type=\"number\" name=\"experience\" min=\"0\" max=\"10\" step=\"1\" value=\"0\">";
					echo "</td>";
					echo "<td>";
						echo"<input type=\"number\" name=\"salary\" min=\"20000\" max=\"100000\" step=\"5000\" value=\"50000\">";
					echo "</td>";
					echo "<td>";
					echo "<input type=\"hidden\" name=\"update_job_id\" value=\"$edit_job_id\">";
					echo "<input type=\"hidden\" name=\"account\" value=\"$result2->account\">";
					echo "<button type=\"submit\">Update</button>";
					echo "</form>";	
					
					
					echo "<form action=\"employer_login.php\" method=\"POST\">";
					echo "<input type=\"hidden\" name=\"account\" value=\"$result2->account\">";
					echo "<button type=\"submit\">Cancel</button>";
					echo "</form>";
					echo "</td>";
				}
				else{
					echo "<td>";echo $result->occupation;echo "</td>";
					echo "<td>";echo $result->location;echo "</td>";
					echo "<td>";echo $result->working_time;echo "</td>";
					echo "<td>";echo $result->education;echo "</td>";
					echo "<td>";echo $result->experience;echo "</td>";
					echo "<td>";echo $result->salary;echo "</td>";
					echo "<td>";echo "</td>";
				}
				echo"</tr>";
			}
			echo "</table>";
			echo "</p>";
			echo "<form action=\"employer_login.php\" method=\"POST\">";
			echo "<button type=\"submit\">Back</button>";
			echo "</form>";
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	}
	else
	{ 
		echo "You can't visit this page.";
		echo'<form action="employee_login.php" method="POST">';
		echo'<button type="submit">Back to login</button>';
		echo'</form>';
	}
?>
</html>