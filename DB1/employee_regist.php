<?
	session_start();
?>
<html>
	<form action="employee_regist2.php" method="POST">
		<label>Account</label><br>
			<input type="text" name="account"><br><br>
		<label>Password</label><br>
			<input type="password" name="password"><br><br>
		<label>Phone</label><br>
			<input type="text" name="phone"><br><br>
		<label>Gender</label><br>
			<select name="gender">
				<option value="Female">Female</option>
				<option value="male">male</option>
			</select><br><br>
		<label>Age</label><br>
			<input type="number" name="age" min="20" max="65" step="1" value="20"><br><br>
		<label>Email address</label><br>
			<input type="text" name="email"><br><br>
		<label>Expected Salary</label><br>
			<input type="number" name="salary" min="20000" max="100000" step="5000" value="50000"><br><br>
		<label>Major Education</label><br>
			<select name="education">
				<option value="Junior High School">Junior High School</option>
				<option value="Undergraduate School">Undergraduate School</option>
				<option value="Senior High School">Senior High School</option>
				<option value="Graduate School">Graduate School</option>
				<option value="Elementary School">Elementary School</option>
			</select><br><br>
		<label>Specialty</label><br>
		<?php
			$db_host="dbhome.cs.nctu.edu.tw";
			$db_name="annie0111279_cs";
			$db_user="annie0111279_cs";
			$db_password="annieking";
			$dsn="mysql:host=$db_host;dbname=$db_name";

			try {
			
				$db=new PDO($dsn,$db_user,$db_password);
				// set the PDO error mode to exception
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
				
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
			
			$sql="SELECT id, specialty FROM specialty";
			$sth = $db->prepare($sql); 
			$sth->execute();
			while($result = $sth->fetchObject()){
				echo "<input type=\"checkbox\" name=array[$result->id] value=1><label>$result->specialty</label>";
			}
			echo '<br>';
		?>
			<button type="submit" >Submit</button>
	</form>
	<form action="homepage.php" type="POST">
	<button ty[e="submit">Back to the homepage</button>
	</form>
</html>
