<?php include("functionpage.php"); ?>
<?php
$status="";
if(isset($_POST["sub"]))
{
	extract($_POST);	
	$path="";
	if($_FILES["photo"]["error"]<=0)
	{
		$path="upload/".$_FILES["photo"]["name"];
		move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
	}	
	$qry="insert into personinfo (pname,address,phone,email,gender,photopath) values ('$tname','$taddress','$tphone','$temail','$gender','$path')";		
	$rs=executeQuery($qry);	
	if($rs=="success")
	{
		$status="Record Inserted Successful";
	}
	else
	{
		$status="Error to Insert Record";
	}
}

$name="";
$address="";
$phone="";
$email="";
$gender="";
$ppath="";

if(isset($_POST["sub1"]))
{
	$search=$_POST["tshow"];
	
	$qry="select *from personinfo where pname like '$search%'";
	$rs=readrecord($qry);	
	if(mysql_num_rows($rs)>0)
	{
	$name=mysql_result($rs,0,"pname");
	$address=mysql_result($rs,0,"address");
	$phone=mysql_result($rs,0,"phone");
	$email=mysql_result($rs,0,"email");
	$gender=mysql_result($rs,0,"gender");
	$ppath=mysql_result($rs,0,"photopath");
	}
	else
	{
		$status="Record not found";
	}
}
?>
<html>
<head>
	<title>Person Record Example</title>
</head>

<body>
<h1>Person Example</h1>
<form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" >
Show : <input type="text" id="tshow" name="tshow" />
<input type="submit" id="sub1" name="sub1" value="Search" />

<br /><br />
Person Name :<br />
<input type="text" id="tname" name="tname" value="<?php echo $name; ?>" /><br /><br />
Address :<br />
<input type="text" id="taddress" name="taddress" value="<?php echo $address; ?>" /><br /><br />
Phone No :<br />
<input type="text" id="tphone" name="tphone" value="<?php echo $phone; ?>" /><br /><br />
Email Address :<br />
<input type="text" id="temail" name="temail" value="<?php echo $email; ?>" /><br /><br />
Gender  :<br />
<input type="radio" id="gender" name="gender" <?php if($gender=="Male"){ echo "checked='checked'";} ?> value="Male" /> Male 
<input type="radio" id="gender" name="gender" <?php if($gender=="Female"){ echo "checked='checked'";} ?> value="Female" /> Female
<br /><br />
Photo : <br />
<input type="file" id="photo" name="photo" />
<?php if($ppath!=""){echo "<img src='$ppath' style='height:80px;width:100px;' />"; } ?>
<br /><br />
<input type="submit" id="sub" name="sub" value="Insert" />
</form>
<br /><br />
<?php
echo $status;
?>
</body>
</html>