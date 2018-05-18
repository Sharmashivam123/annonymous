<?php
$status="";
if(isset($_POST["btnsub"]))
{
	extract($_POST);
	$qry="select * from memberinfo where mname like '%$tsearch%' order by mid";	
	$con=mysql_connect("localhost","root","");
	mysql_select_db("jay_batch",$con);	
	$rs=mysql_query($qry,$con);	
	if(mysql_num_rows($rs)>0)
	{
		while($row=mysql_fetch_array($rs))
		{
		$status.="<div class='itemclass' ><center><br />";
		$status.="M Id is ".$row[0]."<br />";
		$status.="M Name is ".$row[1]."<br />";
		$status.="Address is ".$row[2]."<br />";
		$status.="Phone is ".$row[3]."<br />";
		$status.="Email is ".$row[4]."<br />";
		$status.="Gender is ".$row[5]."<br /><br />";
		$status.="<a href='moreinfo.php?mid=$row[0]' class='clsa' >View More</a>";
		$status.="<br />";
		$status.="</center></div>";
		}
	}
	else
	{
		echo "Record not found";
	}
}
?>
<html>
<head>
	<title>Fetch Method Example</title>
	<style type="text/css" >
	.itemclass
	{
		height:150px;width:300px;border:solid 1px #000000;
		background-color:#333333;color:#FFFFFF;border-radius:10px 10px;
		float:left;font-size:14px;margin-left:5px;margin-top:5px;
		position:relative;opacity:0.6;
	}
	
	.itemclass:hover
	{
		background-color:#003366;color:#FFFF00;
		font-size:16px;opacity:1.0;
	}
	.clsa
	{
		margin:5px 10px 5px 10px;text-decoration:none;padding:5px 10px 5px 10px;color:#FFFFFF;background-color:#00FF00;
	}
	
	</style>
</head>

<body>
<h1>Fetch Method Example</h1>
<form id="frm" name="frm" action="" method="post" >
Search : <input type="text" id="tsearch" name="tsearch" />
<input type="submit" id="btnsub"  name="btnsub" value="Show" />
</form>

<br /><br />
<?php
echo $status;
?>
</body>

</html>