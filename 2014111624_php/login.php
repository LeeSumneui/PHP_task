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
		echo "<script> window.alert('��ϵ��� ���� ���̵� �Դϴ�. '); history.go(-1);</script>";
	}
	else
	{
		$row=mysql_fetch_array($result);
		$db_pass=$row[pw];

		if($pw!=$db_pass)
		{
			echo("<script> window.alert('��й�ȣ�� Ʋ���ϴ�. '); history.go(-1);</script>");
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