<?
	session_start();

	include "./lib/dbconn.php";
	
	if($table=="board")
		$sql="delete from board where num='$num'";
	if($table=="gallery")
		$sql="delete from gallery where num='$num'";

	mysql_query($sql,$connect);

	mysql_close();

	if($table=="board")
		echo("<script> location.href='list_board.php';</script>");
	if($table=="gallery")
		echo("<script> location.href='gallery_main.php';</script>");
?>