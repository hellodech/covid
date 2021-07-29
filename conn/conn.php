<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "12345678";
$db_name = "covid";

$Conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//mysqli_set_charset($Conn, "tis-620");
mysqli_set_charset($Conn, "utf8");
//mysql_query("set character set utf8");

if(mysqli_connect_errno()){
	echo 'การเชื่อมต่อมีปัญหา กรุณาตรวจสอบͺ Connect to Database have Problem !!! '.mysqli_connect_error(
		);
}
?>