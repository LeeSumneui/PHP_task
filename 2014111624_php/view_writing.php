<?
	session_start();
	$table="board";	

	include "./lib/dbconn.php";
	
	$sql="select * from board where num='$num'";
	$result = mysql_query($sql,$connect);
	
	$row=mysql_fetch_array($result);

	$item_num=$row[num];
	$item_id=$row[id];
	$item_click=$row[click];
	$date=$row[register_day];
	$item_date=substr($date,0,10);
	$item_subject=str_replace(" ","&nbsp;",$row[subject]);
	$item_content=str_replace(" ","&nbsp;",$row[content]);
	
	$new_click=$item_click+1;
	$sql = "update board set click='$new_click' where num='$item_num'";
	mysql_query($sql,$connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="css/common2.css">
<style>
	
</style>
<script>
	function del(href)
	{
		if(confirm("삭제하시겠습니까?"))
		{
			document.location.href=href;
		}
	}
</script>
</head>

<body>
<div id="wrap">	
<div id="header">
	<? include "./lib/top_login.php";?>
</div> 
 <!-- end of header -->	
<div >	
	<a href="index.php"><img src="./s_img/main.gif" border="0"></a>
</div>
<div id="menu">	
	<? include "./lib/menubar.php"; ?>	
</div>  <!-- end of menu -->  
<div id="content">

<form name="write_form" method="post" action="insert_content.php">
<div style="height:50px; background-color:#FFFFFF;"></div>
	<br><div style="height:50px; margin-right:150px;"><img src="./s_img/게시글.gif"></div>
<div style="height:50px; background-color:#FFFFFF;"></div>
<br><div style="height:450px; width:100px; background-color:#FFFFFF; float:left;"></div>
<div style="height:700px; float:left; background-color:#FFFFFF;">
<div class="clear"></div>
<div style="height:350px; background-color:#FFFFFF; float:left; margin-left:100px;">
	<div style="height:30px; width:80px; float:left; background-color:#FFFFFF; text-align:center;"><img src="./s_img/subject.gif"></div>
	<div style="height:30px; width:420px; float:left; background-color:#FFFFFF; margin-left:15px;"><?=$item_subject?></div>
	<div style="height:30px; width:100px; float:left; background-color:#FFFFFF;">조회수 : <?=$item_click?></div>
	<br><div class="clear"></div>
	<div style="height:30px; width:80px; float:left; background-color:#FFFFFF; text-align:center;"><img src="./s_img/writer.gif"></div>
	<div style="height:30px; width:420px; float:left; background-color:#FFFFFF; margin-left:15px;"><?=$item_id?></div>
	<div class="clear"></div>
	<div style="height:300px; width:600px; margin-top:40px; background-color:#FFFFFF;"><?=$item_content?></div>
</div><!--textarea-zone end-->
</form>
<div class="clear"></div>
	<?
		if($userid==$item_id)
		{
	?>
	<div style="height:40px; float:right; width:50px; margin-left:10px; margin-top:10px; background-color:#FFFFFF">
	<form method="post" action="write_form.php?mode=modify&num=<?=$num?>">
		<input type="image" src="./s_img/글쓰기_modify버튼.gif">
	</form></div>
	<div style="height:40px; float:right; width:50px; margin-left:10px; margin-top:10px; background-color:#FFFFFF">
	<form method="post" action="delete_writing.php?num=<?=$num?>&table=<?=$table?>">
		<input type="image" src="./s_img/글쓰기_delete.gif" style="float:right;">
	</form></div>

	<?
		}
	?>
	<div style="height:40px; float:right; width:480px; margin-top:10px; background-color:#FFFFFF">
	<form method="post" action="list_board.php?page=<?=$page?>">
		<input type="image" src="./s_img/글쓰기_list버튼.gif" style="float:right;">
	</form></div>

</div>
<div class="clear"></div>

</div><!--노란큰보드 end-->
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>