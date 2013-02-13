<?php
$db = '';
$base = "/path/of/backup/folder/";
$today = date("Ymd"); //Ymd_his
system("mkdir $base$today"); //create folder named by today
$path = $base.$today;
$table_full = array("table1", "table2"); //backup tables that include data
$table_schema = array("table3", "table4"); //only backup schema

//backup to home
$i = 0;
while(isset($table_full[$i])){
	system("mysqldump -u user -p password $db $table_full[$i] > $path/$table_full[$i].sql");
	$i++;
}

// only backup table schema
$j = 0;
while(isset($table_schema[$j])){
	system("mysqldump -u user -p password -d $db $table_schema[$j] > $path/$table_schema[$j].sql");
	$j++;
}
?>
