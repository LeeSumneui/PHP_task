<?
	session_start();
?>
<meta charset="euc-kr">
<?
	$ph=$ph1."-".$ph2."-".$ph3;
	$email_d = $email."@".$email_domain;

	echo "$ph/$email_d/$pw/$name";
	include "./lib/dbconn.php";

	$sql = "update member set pw= '$pw' , name = '$name' , ph_agency='$agency',";
	$sql .= "address = '$address' , ph = '$ph' , email = '$email_d' where id='$userid' ";

	mysql_query($sql,$connect);
	
	mysql_close();
	
	echo("<script>location.href='./index.php';</script>");
?>