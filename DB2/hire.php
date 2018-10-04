<? session_start(); ?>
<html>
<style type="text/css">
      #button {  /* Box in the button */
        display: block;
		border: 1px solid black;
        width: 200px;
      }

      #button a {
        text-decoration: none;  /* Remove the underline from the links. */
      }

      #button ul {
        list-style-type: none;  /* Remove the bullets from the list */
      }

      #button .top {
        background-color: #FFFFFF;  /* The button background */
      }

      #button ul li.item {
        display: none;  /* By default, do not display the items (which contains the links) */
      }  

      #button ul:hover .item {  /* When the user hovers over the button (or any of the links) */
        display: block;
        border: 1px solid black;
        background-color: #FFFFFF;
      }
	  
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #;
	border:1px solid #ffffff;
	
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
.CSSTableGenerator tr:nth-child(odd){ background-color:#000000; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:6px;
	font-size:15px;
	font-family:Trebuchet MS;
	font-weight:bold;
	color:#3a96f2;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #FDFF73 5%, #FDFF73 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #FDFF73), color-stop(1, #FDFF73) );
	background:-moz-linear-gradient( center top, #FDFF73 5%, #FDFF73 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#FDFF73", endColorstr="#FDFF73");	background: -o-linear-gradient(top,#FDFF73,FDFF73);

	background-color:#FDFF73;
	border:0px solid #000000;
	text-align:left;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Trebuchet MS;
	font-weight:bold;
	color:#3a96f2;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #FDFF73 5%, #FDFF73 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #FDFF73), color-stop(1, #FDFF73) );
	background:-moz-linear-gradient( center top, #FDFF73 5%, #FDFF73 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#FDFF73", endColorstr="#FDFF73");	background: -o-linear-gradient(top,#FDFF73,FDFF73);

	background-color:#FDFF73;
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
	if(isset($_SESSION['employee_exist'])){
			echo"You cannot see employers' websites.\n";
			echo'<form action="employee_login.php" method="POST">';
			echo'<button type="submit">Back to login</button>';
			echo'</form>';
	}
	else{
		
		$acc=$_SESSION['employer_exist'];
		echo "Hello ".$acc."!";
		echo'<center>';
			echo"Who applies for your jobs.";
		echo'</center>';
	
		try {
			$db=new PDO($dsn,$db_user,$db_password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db1=new PDO($dsn,$db_user,$db_password);
			$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db2=new PDO($dsn,$db_user,$db_password);
			$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db3=new PDO($dsn,$db_user,$db_password);
			$db3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$acc=$_SESSION['employer_exist'];
			
			$sql="select id from employer where account ='$acc' ";
			$sth = $db->prepare($sql);
			$sth->execute();
			$result = $sth -> fetchObject();
			$e_id=$result->id;//現在登入的employer id
			
			$r_id=$_POST['hire'];//hire的recruit id
			$sql="delete from recruit where id ='$r_id' ";
			$sth = $db->prepare($sql);
			$sth->execute();
			
			
			$sql= "SELECT o.occupation, l.location, r.employer_id, r.working_time, r.education, r.experience, r.salary,r.id ".
				   "FROM recruit r ".  
				   "LEFT JOIN occupation o ON r.occupation_id = o.id ".
				   "LEFT JOIN location l ON r.location_id = l.id ".
				   "where r.employer_id='$e_id' ";
			$sth = $db->prepare($sql);
			$sth->execute();
			echo "<p class=\"CSSTableGenerator\">";
			echo "<table border=\"1\">";
			while($result = $sth -> fetchObject()){//印工作
					echo'<tr style="background-color:#FDFF73;">';
						$r_id=$result->id;//recruit id
						echo "<td>";echo $result->occupation;echo "</td>";
						echo "<td>";echo $result->location;echo "</td>";
						echo "<td>";echo $result->working_time;echo "</td>";
						echo "<td>";echo $result->education;echo "</td>";
						echo "<td>";echo $result->experience;echo "</td>";
						echo "<td>";echo $result->salary;echo "</td>";
					echo'</tr>';
					
					$sql2="select * from application where recruit_id ='$r_id' ";
					$sth2 = $db2->prepare($sql2);
					$sth2->execute();
					while($result2 = $sth2 -> fetchObject()){//看這個recruit有沒有user apply
						$recruit_id=$result2->recruit_id;
						$user_id=$result2->user_id;//apply這個recruit的user id
						$sql3="select * from user where id='$user_id' ";
						
						$sth3 = $db3->prepare($sql3);
						$sth3->execute();
						$result3 = $sth3 -> fetchObject();
						echo'<tr style="background-color:#FFFFFF;">';
							echo "<td>";echo $result3->account;echo "</td>";
							echo "<td>";echo $result3->gender;echo "</td>";
							echo "<td>";echo $result3->age;echo "</td>";
							echo "<td>";echo $result3->education;echo "</td>";
							echo "<td>";echo $result3->expected_salary;echo "</td>";
							echo "<td>";
							echo $result3->phone;echo'<br>';
							echo $result3->email;
							$sql1= "SELECT s.specialty, us.user_id ".
									   "FROM user_specialty us ". 
									   "LEFT JOIN specialty s ON us.specialty_id = s.id";
							$sth1 = $db1->prepare($sql1);
							$sth1->execute();
								echo "<div id=\"button\">";
									echo "<ul>";
										//echo $temp1;
										echo "<li class=\"top\">This job seeker's specialties</li>";
										while($result1 = $sth1 -> fetchObject()){
											
											if($result3->id==$result1->user_id){
											$temp2=$result1->specialty;
											echo "<li class=\"item\"><a>$temp2</a></li>";
											}
										}
										
									echo "</ul>";
								echo "</div>";
								echo '<form method="POST">';
									echo"<button type=\"submit\" name=\"hire\" value=\"$recruit_id\" > Hire </button> ";
								echo '</form>';
							echo "</td>";
						echo'</tr>';
					}
					
				
			}
			echo "</p>";
			echo "</table>";
			
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		echo '<form action="employer_login.php" method="POST">';
		echo '<button type="submit">Back to Login</button>';
		echo '</form>';
	}
	
?>

