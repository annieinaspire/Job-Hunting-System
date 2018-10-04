<?
	session_start();
?>
<html>
<title>Employers Registration</title>
<form action="employer_regist2.php" method="POST">
	<label>Account</label><br>
	<input type="text" name="account"><br>
	<label>Password</label><br>
	<input type="password" name="password"><br>
	<label>Phone number</label><br>
	<input type="text" name="phone"><br>
	<label>Email</label><br>
	<input type="text" name="email"><br>

		<button type="submit">submit</button>
</form>
<form action="homepage.php" method="POSt">
	<button type="submit">Back to the homepage</button>
</form>
</html>