<html>
<head>
<title>Insert Example</title>

</head>

<body>
<form id="frm" name="frm" action="" method="post" >
User Name :<br />
<input type="text" id="tuser" name="tuser" />
<br /><br />
Password :<br />
<input type="password" id="tpwd" name="tpwd" />
<br /><br />
<input type="submit" id="sub" name="sub" value="Insert" />
</form>
<br /><br />
<?php
if(isset($_POST["sub"]))
{
extract($_POST);	
$qry="insert into userinfo (username,pwd) values ('$tuser','$tpwd')";
$con=mysql_connect("localhost","root","");
mysql_select_db("jay_batch",$con);
$rs=mysql_query($qry,$con);
if(!$rs)
{	echo "Error to insert error is ".mysql_error(); }
else
{ 	echo "Record Inserted Successful"; }
mysql_close($con);
}
?>

</body>
</html>