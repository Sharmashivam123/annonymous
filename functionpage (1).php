<?php
function setconnect()
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("jay_batch",$con);
	return $con;
}

function readrecord($qry)
{
	$rs=mysql_query($qry,setconnect());
	return $rs;
}

function countrow($qry)
{
	$rs=mysql_query($qry,setconnect());
	
	$count=mysql_num_rows($rs);
	
	return $count;
}

function executeQuery($qry)
{
	$rs=mysql_query($qry,setconnect());
	$status="";
	if(!$rs)
	{
		$status="Record have Error : Error is ".mysql_error();
	}
	else
	{
		$status="success";
	}
	return $rs;
}

function executeQuery_id($qry)
{
	$rs=mysql_query($qry,setconnect());
	$status="";
	if(!$rs)
	{
		$status=0;
	}
	else
	{
		$rs=mysql_insert_id();
	}
	return $rs;
}


function fill_table($qry)
{
	$tab="";
	$rs=mysql_query($qry,setconnect());	
	if(mysql_num_rows($rs)>0)
	{
		$tab.="<table border='1' >";
		$tab.="<tr>";
		$colcount=mysql_num_fields($rs);
		for($p=0;$p<$colcount;$p++)
		{
			$tab.="<th>".mysql_field_name($rs,$p)."</th>";
		}
		$tab.="</tr>";		
		while($row=mysql_fetch_array($rs))
		{
			$tab.="<tr>";
			for($p=0;$p<$colcount;$p++)
			{
			$tab.="<td>".$row[$p]."</td>";
			}	
			$tab.="</tr>";
		}		
		$tab.="</table>";
	}
	else
	{
		$tab="Record not found";
	}
	return $tab;
}
?>