<meta charset="euc-kr">
<?
	$hp=$ph1."-".$ph2."-".$ph3;
	$email=$email."@".$email_domain;
	$ph_agency = $agency;
	
		
	$regist_day=date("Y-m-d (H:i)");
	$ip=$REMOTE_ADDR;

	include "./lib/dbconn.php";

	$sql = "select * from member where id = '$id'";
	$result = mysql_query($sql,$connect);
	$exits_id = mysql_num_rows($result);

	if($exist_id)
	{
		echo ("<script> 
			window.alert('해당아이디가 존재합니다.')
			history.go(-1)</script>");
		exit;
	}
	else
	{
		$sql = "insert into member(id,pw,name,gender,address,ph,ph_agency,email) ";
		$sql .="values('$id','$pw','$name','$gender','$address','$hp','$ph_agency','$email')";
		mysql_query($sql,$connect);
	}

	mysql_close();
	echo("<script>location.href='./index.php';</script>");
?>