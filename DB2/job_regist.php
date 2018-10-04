<?
	session_start();
?>
<html>
<?php /*echo $_POST['account'];*/$account=$_POST['account'];?>

<title>Add a new job!</title>

<?
	if(!isset($_SESSION['employee_exist'])){
		echo'<table style="width:100%">';
		echo'<tr>';
			echo'<td>Occupation<td>';
			echo'<td>Location<td>';
			echo'<td>Work Time<td>';
			echo'<td>Education Required<td>';
			echo'<td>Working Experience<td>';
			echo'<td>Salary per month<td>';
		echo'<tr>';
	}
	
	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";
	$acco=$_SESSION['employer_exist'];
	if(isset($_SESSION['employee_exist'])){
		echo"You cannot see employers' websites.\n";
		echo'<form action="employee_login.php" method="POST">';
		echo'<button type="submit">Back to login</button>';
		echo'</form>';
	}
	else{
		try {
		
			$db=new PDO($dsn,$db_user,$db_password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			echo "<form action=\"job_regist2.php\" method=\"POST\">";
				echo "<td>";
					echo "<select name=\"occupation\">";
						$sql="SELECT * FROM occupation";
						$sth = $db->prepare($sql); 
						$sth->execute();
						while($result = $sth->fetchObject()){
							echo "<option value=$result->id>"; 
							echo $result->occupation; 
							echo "</option>"; 
						}
					echo '</select>'; 
				echo '<td>';
				echo '<td>';
					echo '<select name="location">';
						$sql="SELECT * FROM location";
						$sth = $db->prepare($sql); 
						$sth->execute();
						
						while($result = $sth->fetchObject()){
							echo "<option value=$result->id>";
							echo $result->location; 
							echo "</option>"; 
						}
					echo '</select>';
				echo '<td>';
				echo '<td>';
					echo '<select name="working_time">';
						echo '<option value="8hrs per day">8hrs per day</option>';
						echo '<option value="9hrs per day">9hrs per day</option>';
						echo '<option value="10hrs per day">10hrs per day</option>';
						echo '<option value="11hrs per day">11hrs per day</option>';
						echo '<option value="12hrs per day">12hrs per day</option>';
					echo '</select>';
				echo '<td>';
				echo '<td>';
					echo '<select name="education">';
						echo '<option value="Elementary School">Elementary School</option>';
						echo '<option value="Junior High School">Junior High School</option>';
						echo '<option value="Senior High School">Senior High School</option>';
						echo '<option value="Undergraduate School">Undergraduate School</option>';
						echo '<option value="Graduate School">Graduate School</option>';
					echo '</select>';
				echo '<td>';
				echo '<td>';
					echo '<input type="number" name="experience" min="0" max="10" step="1" value="1">';
				echo '<td>';
				echo '<td>';
					echo '<input type="number" name="salary" min="0" max="100000" step="1000" value="30000">';
				echo '<td>';
			echo '</tr>';
			echo '</table>';
		
			echo "<input type=\"hidden\" name=\"acc\" value=\"$acco\">"; 
		
			echo "<button type=\"submit\">Add</button>";
			echo "</form>";

			if(!isset($_SESSION['employee_exist'])){
				echo "<form action=\"employer_login.php\" method=\"POST\">";
				echo "<button type=\"submit\">Cancel</button>";
				echo "</form>";
			}
			
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}		
	}
?>
</html>
