<?
	session_start();
?>
<html>
<?php /*echo $_POST['account'];*/$account=$_POST['account'];?>
<title>Add a new job!</title>

	<table style="width:100%">
		<tr>
			<td>Occupation<td>
			<td>Location<td>
			<td>Work Time<td>
			<td>Education Required<td>
			<td>Working Experience<td>
			<td>Salary per month<td>
		<tr>
	<?php
		$db_host="dbhome.cs.nctu.edu.tw";
		$db_name="annie0111279_cs";
		$db_user="annie0111279_cs";
		$db_password="annieking";
		$dsn="mysql:host=$db_host;dbname=$db_name";
		$acco=$_SESSION['employer_exist'];
		try {
		
			$db=new PDO($dsn,$db_user,$db_password);
			// set the PDO error mode to exception
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}	
	?>
			<form action="job_regist2.php" method="POST">
			<td>
			<select name="occupation">
				<?php
					$sql="SELECT * FROM occupation";
					$sth = $db->prepare($sql); 
					$sth->execute();
					while($result = $sth->fetchObject()){
						echo "<option value=$result->id>"; 
						echo $result->occupation; 
						echo "</option>"; 
					}
				?> 
				</select>
			<td>
			<td>
			<select name="location">
				<?php
					$sql="SELECT * FROM location";
					$sth = $db->prepare($sql); 
					$sth->execute();
					
					while($result = $sth->fetchObject()){
						echo "<option value=$result->id>";
						echo $result->location; 
						echo "</option>"; 
					}	
				?> 
				</select>
			<td>
			<td>
				<select name="working_time">
					<option value="8hrs per day">8hrs per day</option>
					<option value="9hrs per day">9hrs per day</option>
					<option value="10hrs per day">10hrs per day</option>
					<option value="11hrs per day">11hrs per day</option>
					<option value="12hrs per day">12hrs per day</option>
				</select>
			<td>
			<td>
				<select name="education">
					<option value="Elementary School">Elementary School</option>
					<option value="Junior High School">Junior High School</option>
					<option value="Senior High School">Senior High School</option>
					<option value="Undergraduate School">Undergraduate School</option>
					<option value="Graduate School">Graduate School</option>
				</select>
			<td>
			<td>
				<input type="number" name="experience" min="0" max="10" step="1" value="1">
			<td>
			<td>
				<input type="number" name="salary" min="20000" max="100000" step="5000" value="30000">
			<td>
		</tr>
	</table>
	
	<?php echo "<input type=\"hidden\" name=\"acc\" value=\"$acco\">"; 
		echo $acco;
	?>
	<button type="submit">Add</button>
</form>
</html>
