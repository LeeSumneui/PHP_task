<?
	session_start();
?>
<?
	if(!$userid)
	{
		echo "<script> window.alert('�α��� �� �̿����ּ���'); history.go(-1); </script>";
		exit;
	}
	if(!$subject)
	{
		echo ("<script> window.alert('������ �Է��ϼ���');
			history.go(-1); location.reload(true); </script>");
		exit;
	}
	if(!$content)
	{
		echo "<script> window.alert('������ �Է��ϼ���'); 
			history.go(-1); location.reload(true); </script>";
		exit;
	}
	
	$register_day=date("Y-m-h(H:i)");
	include "./lib/dbconn.php";

	
		if(mode=="modify")
		{
	
			$sql="update board set subject='$subject', content='$content', catagory='$catagory' where num=$num";
		}	
		else
		{
			$content=htmlspecialchars($content);
	
			$sql="insert into board(subject,id,content,register_day,click,catagory) values				('$subject','$userid','$content','$register_day','$click','$catagory')";
		}
	
		mysql_query($sql,$connect);
		mysql_close();

		echo ("<script> location.href='list_board.php?page=$page';</script>");
	
?>