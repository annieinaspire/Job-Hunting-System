<?php
session_start();
session_destroy();
?>
<html>
<style type="text/css">
.CSSButtonGenerator {
	-moz-box-shadow:inset 0px 1px 0px 0px #fceaca;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fceaca;
	box-shadow:inset 0px 1px 0px 0px #fceaca;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffce79), color-stop(1, #eeaf41) );
	background:-moz-linear-gradient( center top, #ffce79 5%, #eeaf41 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffce79', endColorstr='#eeaf41');
	background-color:#ffce79;
	-webkit-border-top-left-radius:10px;
	-moz-border-radius-topleft:10px;
	border-top-left-radius:10px;
	-webkit-border-top-right-radius:10px;
	-moz-border-radius-topright:10px;
	border-top-right-radius:10px;
	-webkit-border-bottom-right-radius:10px;
	-moz-border-radius-bottomright:10px;
	border-bottom-right-radius:10px;
	-webkit-border-bottom-left-radius:10px;
	-moz-border-radius-bottomleft:10px;
	border-bottom-left-radius:10px;
	text-indent:0;
	border:1px solid #eeb44f;
	display:inline-block;
	color:#ffffff;
	font-family:Georgia;
	font-size:24px;
	font-weight:bold;
	font-style:normal;
	height:47px;
	line-height:47px;
	width:300px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 0px 0px #ce8e28;
}
.CSSButtonGenerator:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #eeaf41), color-stop(1, #ffce79) );
	background:-moz-linear-gradient( center top, #eeaf41 5%, #ffce79 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eeaf41', endColorstr='#ffce79');
	background-color:#eeaf41;
}.CSSButtonGenerator:active {
	position:relative;
	top:1px;
}
</style>
<font size='30'>
	<center>
		Thanks for visiting us!
	</center>
</font>

<center>
<form action="homepage.php" method="POST">
<button type="submit" p class="CSSButtonGenerator"> Back to the homepage </button /p> 
</form>
</center>

</html>