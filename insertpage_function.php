<?php
include("functionpage.php");
$status="";
if(isset($_POST["sub"]))
{
	extract($_POST);	
	$qry="insert into memberinfo (mname,address,phone,email,gender) values ('$tname','$taddress','$tphone','$temail','$tgender')";	
	$rs=executeQuery($qry);
	if($rs=="success")
	{
		$status="Record Inserted Successful";
	}
	else
	{
		$status=$rs;
	}
}
?>
<html>
<head>
	<title>Function Example</title>
</head>

<body>
<h1>Insert Member Page</h1>
<form id="frm" name="frm" action="" method="post" >
Name : <br />
<input type="text" id="tname" name="tname" /><br /><br />
Address : <br />
<input type="text" id="taddress" name="taddress" /><br /><br />
Phone No : <br />
<input type="text" id="tphone" name="tphone" /><br /><br />
Email Address : <br />
<input type="text" id="temail" name="temail" /><br /><br />
Gender : <br />
<input type="text" id="tgender" name="tgender" /><br /><br />
<input type="submit" id="sub" name="sub" value="Insert" />
</form>
<br /><br />
<?php
echo $status;
?>
<br /><br />
</body>
</html>