<?php
$status="";
if(isset($_POST["sub"]))
{
	extract($_POST);	
	$con=mysql_connect("localhost","root","");	
	mysql_select_db("jay_batch",$con);	
	$qry="update memberinfo set mname='$tname',address='$taddress',phone='$tphone',email='$temail',gender='$gender' where mid='$tmid'";
	
	$rs=mysql_query($qry,$con);	
	if(!$rs)
	{
		$status="Error in Code Error is ".mysql_error();
	}
	else
	{
		$status="Employee Information Updated successful";
	}
}
?>
<html>
<head>
<title>Update Demo</title>
</head>
<body>
<h3>Update Example : <?php echo $status; ?></h3>

<form id="frm" name="frm" action="" method="post" >
Member Name :<br />
<input type="text" id="tname" name="tname" /><br /><br />
Address :<br/ >
<input type="text" id="taddress" name="taddress" /><br /><br />

Email Address :<br />
<input type="text" id="temail" name="temail" /><br /><br />
Phone Number :<br/ >
<input type="text" id="tphone" name="tphone" /><br /><br/ >

Gender :<br />
<select id="gender" name="gender" >
<option value="Male" >Male</option>
<option value="Female" >Female</option>
</select>
<br /><br />
Update Member Id : <input type="text" id="tmid" name="tmid" />
<input type="submit"  id="sub" name="sub" value="Update" />
</form><br /><br />



</body>
</html>