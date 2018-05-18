<?php
$status="";
if(isset($_POST["sub1"]))
{
	extract($_POST);	
	$qry="select *from memberinfo where mname like '$tsearch%'";	
	$con=mysql_connect("localhost","root","");	
	mysql_select_db("jay_batch",$con);	
	$rs=mysql_query($qry,$con);
	if(mysql_num_rows($rs)>0)
	{	
	$status="<h2>Result is : </h2>";
	$count=mysql_num_rows($rs);
	for($p=0;$p<$count;$p++)
	{
	$status.="<h4>Name is : ".mysql_result($rs,$p,"mname")."</h4>";
	$status.="<h4>Address is : ".mysql_result($rs,$p,"address")."</h4>";
	$status.="<h4>Phone is : ".mysql_result($rs,$p,"phone")."</h4>";
	$status.="<h4>Email is : ".mysql_result($rs,$p,"email")."</h4>";
	$status.="<h4>Gender is : ".mysql_result($rs,$p,"gender")."</h4>";	
	$status.="<br /><br />";
	}
	}
	else
	{
		$status="Record not found";
	}
}

?>
<html>
<head>
<title>Result Method Example</title>
</head>

<body>
<h3>Result Method Example</h3>
<form id="frm" name="frm" action="" method="post" >
Search : <input type="text" id="tsearch" name="tsearch" />
 <input type="submit" id="sub1" name="sub1" value="Show" />
</form>
<br /><br />
<?php
echo $status;
?>
</body>
</html>
