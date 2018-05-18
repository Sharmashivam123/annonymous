<?php
include("functionpage.php");
?>
<html>
<head>
<title>Pagging Example</title>
</head>

<body>

<?php
$rindex=0;
if(isset($_GET["rid"]))
{
	$rindex=$_GET["rid"];
}
$qry="select *from memberinfo order by mid limit $rindex,3";
echo fill_table($qry);

$rcount=countrow($qry);
echo "<br />";
echo "<a href='prev.php?rindex=$rindex' >Prev</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
if($rcount>0)
{
echo "<a href='next.php?rindex=$rindex' >Next</a>";
}
?>

</body>
</html>
