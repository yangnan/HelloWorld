<?php

$tabledb=array();

$othortable=array();
$query = $db->query("SHOW TABLES");
while ($rt = $db->fetch_array($query)){
	$value = trim(current($rt));

		$othortable[]=$value;

}
?>