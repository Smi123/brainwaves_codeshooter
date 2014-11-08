<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$database="security_bankkit";
	
	$link=mysql_connect($dbhost,$dbuser,$dbpass);
	//echo "test  link"+$link;
	mysql_select_db($database);
	
	function updatedb($query)
	{
	echo "test";
		if(mysql_query($query))
			return true;
		else
			return false;
	}

	function getdb($query)
	{
		$res=@mysql_query($query);
		$values=null;
		$i=0;
		$cols=@mysql_num_fields($res);
		while($rows=@mysql_fetch_array($res))
		{
			for($j=0;$j<$cols;$j++)
			{
				$values[$i][mysql_field_name($res,$j)]=htmlspecialchars($rows[$j]);
			}
			$i++;
		}
		return $values;
	}
	
	function upload_file($file,$filename)
	{
		if(copy($file['tmp_name'], $filename)) 
			return true;
		else
			return false;
	}
	
	function get_extention($filename)
	{
		$ext="";
		for($i=strlen($filename)-1;$filename[$i]!='.';$i--)
			$ext=$filename[$i].$ext;
		return $ext;
	}
?>