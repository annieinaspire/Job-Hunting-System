<?php
	session_start();
?>
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
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #7f0000;
	
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
.CSSTableGenerator tr:nth-child(odd){ background-color:#ffffff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #7f0000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:15px;
	font-family:Georgia;
	font-weight:bold;
	color:#020202;
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
	font-family:Georgia;
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
		
			$db1=new PDO($dsn,$db_user,$db_password);
			// set the PDO error mode to exception
			$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$sql= "SELECT u.id, u.account, u.education, u.expected_salary, u.phone, u.gender, u.age, u.email FROM user u ";
			$sth = $db->prepare($sql);
			$sth->execute();
			

			echo "<p class=\"CSSTableGenerator\">";
			echo "<table border=\"1\">";
				echo"<tr>";
				echo"<td>ID</td>";
				echo"<td>Name</td>";
				echo"<td>Education</td>";
				echo"<td>Expaected Salary</td>";						
				echo"<td>Phone Number</td>";
				echo"<td>Gender</td>";
				echo"<td>Age</td>";
				echo"<td>Email</td>";
				echo"<td>Specialties</td>";
				echo"</tr>";
				while($result = $sth -> fetchObject()){
				
					$sql1= "SELECT s.specialty, us.user ".
						   "FROM user_specialty us ". 
						   "LEFT JOIN specialty s ON us.specialty_id = s.id";
					$sth1 = $db1->prepare($sql1);
					$sth1->execute();
					
					echo"<tr>";
					$id2=$result->id;//recruit id
					echo "<td>";echo $result->id;echo "</td>";
					echo "<td>";echo $result->account;echo "</td>";
					echo "<td>";echo $result->education;echo "</td>";
					echo "<td>";echo $result->expected_salary;echo "</td>";
					echo "<td>";echo $result->phone;echo "</td>";
					echo "<td>";echo $result->gender;echo "</td>";
					echo "<td>";echo $result->age;echo "</td>";
					echo "<td>";echo $result->email;echo "</td>";
					//for($x=0;$x<sizeof($multiarray2);$x++){if($multiarray2[$x][0]==$result->account)$temp1=$x;}
					echo "<td>";
						echo "<div id=\"button\">";
						echo "<ul>";
							//echo $temp1;
							echo "<li class=\"top\">This job seeker's specialties</li>";
							while($result1 = $sth1 -> fetchObject()){
								
								if($result->account==$result1->user){
								$temp2=$result1->specialty;
								echo "<li class=\"item\"><a>$temp2</a></li>";
								}
							}
							/*for($s=1;$s<sizeof($multiarray2[$temp1]);$s++){
								$temp2=$multiarray2[$temp1][$s];
								echo "<li class=\"item\"><a>$temp2</a></li>";
							}*/
						echo "</ul>";
						echo "</div>";
					echo "</td>";
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
?>