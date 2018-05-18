<?php
include("functionpage.php");
$status="";
if(isset($_POST["sub"]))
{
	extract($_POST);
	$qry="select *from userinfo where username like '$tsearch%' order by userid"; //"select mid as 'M. Id',mname as 'Member Name',address as 'Present Address',phone as 'Phone Number',email as 'Email Address',gender as 'Gender' from memberinfo where mname like '$tsearch%' order by mid desc";
	$status=fill_table($qry);
}
?>
<html>
<head>
<title>Search Page</title>
</head>

<body>
<form id="frm" name="frm" action=""  method="post" >
Search : <input type="text" id="tsearch" name="tsearch" />
<input type="submit" id="sub" name="sub" value="Result" />
</form>
<br /><br />
<?php echo $status; ?>
</body>
</html>
