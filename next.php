<?php

$rind=$_GET["rindex"];

$rind=$rind+3;

header("location:pagging_demo.php?rid=$rind");

?>