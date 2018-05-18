<?php
$rind=$_GET["rindex"];
if($rind==0)
{
}
else
{
$rind=$rind-3;
}
header("location:pagging_demo.php?rid=$rind");

?>