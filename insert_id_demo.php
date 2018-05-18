<?php
include("functionpage.php");
$status="";
$id=0;
if(isset($_POST["sub"]))
{
	extract($_POST);		
	$qry="insert into userinfo (username,pwd) values ('$tuname','$tpwd')";	
	$rs=executeQuery_id($qry);	
	if($rs!=0)
	{
	$status="Insert Id is ".$rs;
	$id=$rs;
	}
	else
	{
	$status="Error to Execute Query";
	}
}


?>
<html>
<head>
	<title>Insert Id Example</title>
</head>
<body>
<form id="frm" name="frm" action="" method="post" >
User Name :<br />
<input type="text" id="tuname" name="tuname" /><br /><br />
Password :<br />
<input type="text" id="tpwd" name="tpwd" /><br /><br />
<input type="submit" id="sub" name="sub" value="Result" />
</form><br /><br />
<?php echo $status; ?>

<br /><br />
<?php
echo fill_table("select *from userinfo where userid='$id' order by userid desc");
?>
</body>
</html> 