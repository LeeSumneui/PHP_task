<?
	session_start();
?>
<meta charset="euc-kr">
<?

	include "./lib/dbconn.php";

	$sql="select * from member where id = '$id'";
	$result=mysql_query($sql,$connect);
	$num_match=mysql_num_rows($result); 
	

	if(!$num_match)
	{
		echo "<script> window.alert('등록되지 않은 아이디 입니다. '); history.go(-1);</script>";
	}
	else
	{
		$row=mysql_fetch_array($result);
		$db_pass=$row[pw];

		if($pw!=$db_pass)
		{
			echo("<script> window.alert('비밀번호가 틀립니다. '); history.go(-1);</script>");
			exit;
		}
		else
		{
			$userid=$row[id];
			$username=$row[name];

			$_SESSION['userid']=$userid;
			$_SESSION['username']=$username;

			echo("<script> location.href='./index.php';</script>");
		}
	}
?>
